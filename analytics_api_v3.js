// Copyright 2012 Google Inc. All Rights Reserved.

/* Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * @fileoverview Sample program traverses the Managemt API hierarchy to
 * retrieve the first profile id. This profile id is then used to query the
 * Core Reporting API to retrieve the top 25 organic
 * Note: auth_util.js is required for this to run.
 * @author api.nickm@gmail.com (Nick Mihailovski)
 */

/**
 * Executes a query to the Management API to retrieve all the users accounts.
 * Once complete, handleAccounts is executed. Note: A user must have gone
 * through the Google APIs authorization routine and the Google Anaytics
 * client library must be loaded before this function is called.
 */
function makeApiCall() {
  outputToPage('output_area','Querying Accounts.');
  gapi.client.analytics.management.accounts.list().execute(handleAccounts);
}


/**
 * Handles the API response for querying the accounts collection. This checks
 * to see if any error occurs as well as checks to make sure the user has
 * accounts. It then retrieve the ID of the first account and then executes
 * queryWebProeprties.
 * @param {Object} response The response object with data from the
 *     accounts collection.
 */
function handleAccounts(response) {
  if (!response.code) {
    if (response && response.items && response.items.length) {
      var firstAccountId = response.items[0].id;
      queryWebproperties(firstAccountId);
    } else {
      updatePage('No accounts found for this user.')
    }
  } else {
    updatePage('There was an error querying accounts: ' + response.message);
  }
}


/**
 * Executes a query to the Management API to retrieve all the users
 * webproperties for the provided accountId. Once complete,
 * handleWebproperties is executed.
 * @param {String} accountId The ID of the account from which to retrieve
 *     webproperties.
 */
function queryWebproperties(accountId) {
  updatePage('Querying Webproperties.');
  gapi.client.analytics.management.webproperties.list({
      'accountId': accountId
  }).execute(handleWebproperties);
}


/**
 * Handles the API response for querying the webproperties collection. This
 * checks to see if any error occurs as well as checks to make sure the user
 * has webproperties. It then retrieve the ID of both the account and the
 * first webproperty, then executes queryProfiles.
 * @param {Object} response The response object with data from the
 *     webproperties collection.
 */
function handleWebproperties(response) {
  if (!response.code) {
    if (response && response.items && response.items.length) {
      var firstAccountId = response.items[0].accountId;
      var firstWebpropertyId = response.items[0].id;
      queryProfiles(firstAccountId, firstWebpropertyId);
    } else {
      updatePage('No webproperties found for this user.')
    }
  } else {
    updatePage('There was an error querying webproperties: ' +
        response.message);
  }
}


/**
 * Executes a query to the Management API to retrieve all the users
 * profiles for the provided accountId and webPropertyId. Once complete,
 * handleProfiles is executed.
 * @param {String} accountId The ID of the account from which to retrieve
 *     profiles.
 * @param {String} webpropertyId The ID of the webproperty from which to
 *     retrieve profiles.
 */
function queryProfiles(accountId, webpropertyId) {
  updatePage('Querying Profiles.');
  gapi.client.analytics.management.profiles.list({
    'accountId': accountId,
    'webPropertyId': webpropertyId
  }).execute(handleProfiles);
}


/**
 * Handles the API response for querying the profiles collection. This
 * checks to see if any error occurs as well as checks to make sure the user
 * has profiles. It then retrieve the ID of the first profile and
 * finally executes queryCoreReportingApi.
 * @param {Object} response The response object with data from the
 *     profiles collection.
 */
function handleProfiles(response) {
  if (!response.code) {
    if (response && response.items && response.items.length) {
      var firstProfileId = response.items[0].id;
      queryCoreReportingApi(firstProfileId);
      queryWebsiteAudienceMetrics(firstProfileId);
	  queryUsersByChannel(firstProfileId);
	  queryAcquisition(firstProfileId);
	  queryUsersByDevice(firstProfileId);
	  queryUsersByPagetitle(firstProfileId);
	  queryDataByCity(firstProfileId);
	  queryDataAll(firstProfileId);
	  displayDashboard();
	} else {
      updatePage('No profiles found for this user.')
    }
  } else {
    updatePage('There was an error querying profiles: ' + response.message);
  }
}


/**
 * Execute a query to the Core Reporting API to retrieve the top 25
 * organic search terms by visits for the profile specified by profileId.
 * Once complete, handleCoreReportingResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */
function queryCoreReportingApi(profileId) {
  updatePage('Querying Core Reporting API.');
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(14),
    'end-date': lastNDays(0),
    'metrics': 'ga:visits',
    'dimensions': 'ga:source,ga:keyword',
    'sort': '-ga:visits,ga:source',
    'filters': 'ga:medium==organic',
    'max-results': 20
  }).execute(handleCoreReportingResults);
}


/**
 * Handles the API reponse for querying the Core Reporting API. This first
 * checks if any errors occured and prints the error messages to the screen.
 * If sucessful, the profile name, headers, result table are printed for the
 * user.
 * @param {Object} response The reponse returned from the Core Reporting API.
 */
function handleCoreReportingResults(response) {
  if (!response.code) {
	  	  console.log("Result By Keyword: "+JSON.stringify(response.result));

    if (response.rows && response.rows.length) {
      var output = [];

      // Profile Name.
      //output.push('output_area','Profile Name: ', response.profileInfo.profileName, '<br>');

      var table = [];

      // Put headers in table.
     /* table.push('<tr>');
      for (var i = 0, header; header = response.columnHeaders[i]; ++i) {
        table.push('<th>', header.name, '</th>');
      }
      table.push('</tr>');
	  */

      // Put cells in table.
      for (var i = 0, row; row = response.rows[i]; ++i) {
        table.push('<tr><td>', row.join('</td><td>'), '</td></tr>');
      }
      table.push('</table>');

      output.push(table.join(''));
      outputToPage('DataByKeywords',output.join(''));
    } else {
      outputToPage('DataByKeywords','No results found.');
    }
  } else {
    updatePage('DataByKeywords','There was an error querying core reporting API: ' +
        response.message);
  }
}


/**
 * Utility method to update the output section of the HTML page. Used
 * to output messages to the user. This overwrites any existing content
 * in the output area.
 * @param {String} output The HTML string to output.
 */
function outputToPage(display_area,output) {
  document.getElementById(display_area).innerHTML = output;
}


/**
 * Utility method to update the output section of the HTML page. Used
 * to output messages to the user. This appends content to any existing
 * content in the output area.
 * @param {String} output The HTML string to output.
 */
function updatePage(output) {
  document.getElementById('output_area').innerHTML += '<br>' + output;
}


/**
 * Utility method to return the lastNdays from today in the format yyyy-MM-dd.
 * @param {Number} n The number of days in the past from tpday that we should
 *     return a date. Value of 0 returns today.
 */
function lastNDays(n) {
  var today = new Date();
  var before = new Date();
  before.setDate(today.getDate() - n);

  var year = before.getFullYear();

  var month = before.getMonth() + 1;
  if (month < 10) {
    month = '0' + month;
  }

  var day = before.getDate();
  if (day < 10) {
    day = '0' + day;
  }

  return [year, month, day].join('-');
}

/***** MY CODE ******/

/**
 * Execute a query to the get data of Website Audiance Metrics for our Google Analytics Dashboard
 * USERS, NEW USERS, SESSIONS, NO OF SESSIONS/USER, PAGEVIEWS, PAGES/SESSION, BOUNCE RATE, SESSION DURATION for the profile specified by profileId.
 * Once complete, handleWebsiteAudienceMetricsResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */
function queryWebsiteAudienceMetrics(profileId) {
  //updatePage('Querying Core Reporting API.');
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
    'metrics': 'ga:users,ga:newUsers,ga:sessions,ga:sessionsPerUser,ga:pageviews,ga:pageviewsPerSession,ga:bounceRate,ga:sessionDuration'
    
  }).execute(handleWebsiteAudienceMetricsResults);
}

function handleWebsiteAudienceMetricsResults(response){
	
  if (!response.code) {
	  console.log("Website Audience Metrics: "+JSON.stringify(response.result));
	  let result_data = response.result.rows[0];
	  
	  let output = [];
	  let dataTitle = ['USERS', 'NEW USERS', 'SESSIONS', 'SESSIONS/USER', 'PAGEVIEWS', 'PAGES/SESSION', 'BOUNCE RATE', 'SESSION DURATION'];
	 // console.log("Website Audience Metrics: "+result_data);
	  
	 // console.log(result_data.length);
	  
	    for (var i = 0; i < result_data.length; i++) {
			
	       output.push('<div class="col-sm-6 col-lg-3 mg-b-10"><div class="card card-body"><h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">'+dataTitle[i] +'</h6><div class="d-flex d-lg-block d-xl-flex align-items-end"><h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">'+ Math.round(result_data[i]) +'</h3></div></div></div>');
	   }
	  outputToPage('WebsiteAudienceMetrics', output.join(''));
	 
	 
  } else {
    outputToPage('There was an error querying : ' + response.message);
  }
}




/**
 * Execute a query to the get data of Users by Channels for our Google Analytics Dashboard
 * Organic Serach, Direct, Refferal for the profile specified by profileId.
 * Once complete, handleUsersByChannelResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */
function queryUsersByChannel(profileId) {
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
	'dimensions': 'ga:channelGrouping',
    'metrics': 'ga:users'
    
  }).execute(handleUsersByChannelResults);
}

function handleUsersByChannelResults(response){
	
	if (!response.code) {
	  let result_data = response.result.rows;
	  let output = [];
	  
	 console.log(JSON.stringify(response.result));

	 // console.log(result_data.length);
		
		for (var key in result_data) {
			output.push('<div class="col-6 channel"><h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">'+ result_data[key][0]+'</h6><div class="d-flex align-items-center"><h3 class="tx-normal tx-rubik mg-b-0">'+result_data[key][1]+'</h3></div></div>');
		}

	  outputToPage('UsersByChannel', output.join(''));
	  outputToPage('organicSearch', result_data[1][1]);
	 
	 
  } else {
    outputToPage('There was an error querying : ' + response.message);
  }
	
}




/**
 * Execute a query to the get data of Users by Channels for our Google Analytics Dashboard
 * Organic Serach, Direct, Refferal for the profile specified by profileId.
 * Once complete, handleWebsiteAudienceMetricsResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */
function queryAcquisition(profileId) {
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
    'metrics': 'ga:pageviewsPerSession,ga:bounceRate'
    
  }).execute(displayMetricsResults);
}

/**
 * Execute a query to the get data of Users by Device for our Google Analytics Dashboard
 * Desktop, Mobile, Others for the profile specified by profileId.
 * Once complete, handleUsersByDeviceResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */
function queryUsersByDevice(profileId) {
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
	'dimensions': 'ga:deviceCategory',
    'metrics': 'ga:users'
    
  }).execute(handleUsersByDeviceResults);
}



function handleUsersByDeviceResults(response){
	
	if (!response.code) {
	  let result_data = response.result.rows;
	  let output = [];
	  
	 //console.log(JSON.stringify(response.result.rows));

	 // console.log(result_data.length);
		
		for (var key in result_data) {
			
			output.push('<div class="col-4 col-lg"><div class="d-flex align-items-baseline"><span class="d-block wd-8 ht-8 rounded-circle bg-primary"></span><span class="d-block tx-10 tx-uppercase tx-medium tx-spacing-1 tx-color-03 mg-l-7">'+ result_data[key][0]+'</span></div><h4 class="tx-normal tx-rubik tx-spacing--1 mg-l-15 mg-b-0">'+ result_data[key][1]+'</h4></div>');
		}

	  outputToPage('UsersByDevice', output.join(''));
	 
	 
  } else {
    outputToPage('There was an error querying : ' + response.message);
  }
	
}

/**
 * Execute a query to the get number of Users by Pageviews for our Google Analytics Dashboard
 * Page Title for the profile specified by profileId.
 * Once complete, handleWebsiteAudienceMetricsResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */
function queryUsersByPagetitle(profileId) {
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
	'dimensions': 'ga:pagePath,ga:pageTitle',
    'metrics': 'ga:users',
	'sort': '-ga:users',
    'max-results': 5
    
  }).execute(handleUsersByPagetitleResults);
}



function handleUsersByPagetitleResults(response){
	
	if (!response.code) {
	  let result_data = response.result.rows;
	  let output = [];
	  
	// console.log(JSON.stringify(response.result.rows));

	 // console.log(result_data.length);
		
		for (var key in result_data) {
			
			output.push('<tr>');
			output.push('<td class="align-middle text-center"><a href="https://jnujaipur.ac.in'+result_data[key][0] +'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link wd-12 ht-12 stroke-wd-3"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg></a></td>');						
			output.push('<td class="align-middle tx-medium">'+result_data[key][1]+'</td>');
            output.push('<td class="align-middle text-right"><span class="tx-medium">'+result_data[key][2]+'</span></td>');
			output.push('</tr>');
		}

	  outputToPage('UsersByPagetitle', output.join(''));
	 
	 
  } else {
    outputToPage('There was an error querying : ' + response.message);
  }
	
}

/**
 * Execute a query to the get data by Cities for our Google Analytics Dashboard
 * Sessions, Bounce Rate, Conversion Rate for the profile specified by profileId.
 * Once complete, handleWebsiteAudienceMetricsResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */

function queryDataByCity(profileId) {
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
	'dimensions': 'ga:city',
    'metrics': 'ga:percentNewSessions,ga:bounceRate,ga:users',
	'sort': '-ga:users',
    'filters': 'ga:country==India',
    'max-results': 20

    
  }).execute(handleDataByCityResults);
}


function handleDataByCityResults(response){
	
	if (!response.code) {
	  let result_data = response.result.rows;
	  let output = [];
	  
	 //console.log(JSON.stringify(response.result.rows));

	 // console.log(result_data.length);
		
		for (var key in result_data) {
			
			output.push('<tr>');
			output.push('<td class="text-left">'+result_data[key][0]+'</td>');						
			output.push('<td class="text-right">'+Math.round(result_data[key][1])+'</td>');
            output.push('<td class="text-right">'+Math.round(result_data[key][2])+'</td>');
            output.push('<td class="text-right">'+result_data[key][3]+'</td>');
			output.push('</tr>');
		}

	  outputToPage('DataByCity', output.join(''));
	 
	 
  } else {
    outputToPage('There was an error querying : ' + response.message);
  }
	
}


/**
 * Execute a query to the get data by Cities for our Google Analytics Dashboard
 * Sessions, Bounce Rate, Conversion Rate for the profile specified by profileId.
 * Once complete, handleWebsiteAudienceMetricsResults is executed.
 * @param {String} profileId The profileId specifying which profile to query.
 */

function queryDataAll(profileId) {
  gapi.client.analytics.data.ga.get({
    'ids': 'ga:' + profileId,
    'start-date': lastNDays(7),
    'end-date': lastNDays(0),
	'dimensions': 'ga:channelGrouping',
    'metrics': 'ga:users, ga:newUsers, ga:sessions, ga:bounceRate, ga:pageviewsPerSession, ga:avgSessionDuration',
	'sort': '-ga:users',
    'max-results': 15

    
  }).execute(handleDataAllResults);
}


function handleDataAllResults(response){
	
	if (!response.code) {
	  let result_data = response.result.rows;
	  let output = [];
	  
	 console.log(JSON.stringify(response.result.rows));

	 // console.log(result_data.length);
		
		for (var key in result_data) {
			
			output.push('<tr>');
			output.push('<td><strong>'+result_data[key][0]+'</strong></td>');						
			output.push('<td><strong>'+result_data[key][1]+'</strong></td>');
            output.push('<td><strong>'+result_data[key][2]+'</strong></td>');
            output.push('<td><strong>'+result_data[key][3]+'</strong></td>');
            output.push('<td><strong>'+result_data[key][4]+'</strong></td>');
            output.push('<td><strong>'+result_data[key][5]+'</strong></td>');
            output.push('<td><strong>'+Math.round(result_data[key][6])/60+'</strong></td>');
			output.push('</tr>');
		}

	  outputToPage('DataAll', output.join(''));
	 
	 
  } else {
    outputToPage('There was an error querying : ' + response.message);
  }
	
}



/** Temporary Result Display for Developer **/

function displayMetricsResults(response){
	 var formattedJson = JSON.stringify(response.result.totalsForAllResults, null, 2);
	 // console.log(formattedJson);
}

function displayMetricsDimentionResults(response){
	 var formattedJson1 = JSON.stringify(response.result.rows);
	// console.log(formattedJson1);
}
function displayDashboard(){
	document.getElementById('dashboard_area').style.visibility="visible";
}
