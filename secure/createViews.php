<?php
global $couchUrl;
$couchUrl = 'http://pi:raspberry@127.0.0.1:5984';
include "../lib/couch.php";
include "../lib/couchClient.php";
include "../lib/couchDocument.php";

/*
/// Facilities View 
$client = new couchClient($couchUrl, 'facilities');
$view_fn="map: function(doc) {
    			emit([doc.context['facilityId'], doc.context['groupId']],doc.resourceId);
			}";
$design_doc->_id = '_design/api';
$design_doc->language = 'javascript';
$design_doc->views = array ( 'facilityGroupID'=> array ('map' => $view_fn ) );
$client->storeDoc($design_doc);
*/


/// Resources View 
/*$client = new couchClient($couchUrl, 'resources'); 
$view_fn="map: function(doc) {
   				emit(null,doc._id);
			}";
$design_doc->_id = '_design/api';
$design_doc->language = 'javascript';
$design_doc->views = array ( 'allResources'=> array ('map' => $view_fn ),'allByAudience'=> array ('map' => function(doc) {
  for(var cnt=0;cnt<doc.audience.length;cnt++){
	if(doc.audience[cnt]=="teacher training"){
   		emit(null,doc._id);
	}
   }
}) );
$client->storeDoc($design_doc);*/



/// Members View 
$client = new couchClient($couchUrl, 'members'); 
$view_fn="map: function(doc) {
      			if(doc.login) {
        			emit(doc.facilityId + doc.login, doc._id);
      			}}";
$design_doc->_id = '_design/api';
$design_doc->language = 'javascript';
$design_doc->views = array ( 'facilityLogin'=> array ('map' => $view_fn ),

'findMemberWithID'=> array ('map' => 'function(doc) {
       	   	var myBoolean = true;
       	    for(var cnt=0;cnt<doc.roles.length;cnt++){
          		if(doc.roles[cnt]=="administrator"|| doc.roles[cnt]=="student"){
         			 myBoolean = false;
          			return;
          		}
       		}
       		if(myBoolean){
          		emit(doc._id, doc.firstName);
       		}}'),
 
 
'listMemNotAdmin'=> array ('map' => 'function(doc) {
       			var myBoolean = true;
       			for(var cnt=0;cnt<doc.roles.length;cnt++){
          			if(doc.roles[cnt]=="administrator"|| doc.roles[cnt]=="student"){
					  	myBoolean = false;
					  	return;
					 }
       			}
       if(myBoolean){
          emit(doc.facilityId, doc._id);
       }}'),
	
'facilityLevel'=> array ('map' => 'function(doc) {
      		if(doc.levels) {
       			if(doc.roles=="student" && doc.status=="active" ){
       				emit(doc.facilityId + doc.levels, doc.lastName);
       			}
      		}}'),

	
'facilityLevelActive'=> array ('map' => 'function(doc) {
      		if(doc.levels) {
       			if(doc.roles=="student" && doc.status=="active" ){
		   			emit(doc.facilityId + doc.levels, doc.lastName);
       			}
     		}}'),
 
 'facilityLevelActive_allStudent_sorted'=> array ('map' => 'function(doc) {
      	if(doc.levels) {
       		if(doc.roles=="student" && doc.status=="active" ){
       			for( var cnt=0; cnt<doc.levels.length; cnt++){
           			emit([doc.facilityId, doc.levels[cnt], doc.lastName],true);
       			}
       		}
      	}}'),
	 
'facilityLevelInactive_allStudent_sorted:'=> array ('map' => 'function(doc) {
      		if(doc.levels) {
       			if(doc.roles=="student" && doc.status=="inactive" ){
       				for( var cnt=0; cnt<doc.levels.length; cnt++){
           				emit([doc.facilityId, doc.levels[cnt], doc.lastName],true);
       				}
       			}
      		}
    	}'),
 
 );
 
 
$client->storeDoc($design_doc);



//
//
//
//
//global $Assignments;
//$Assignments = new couchClient($couchUrl, $dbNames['assignments']);
//global $Members;
//$Members = new couchClient($couchUrl, $dbNames['members']); 
//global $Actions;
//$Actions = new couchClient($couchUrl, $dbNames['actions']); 
//global $Questions;
//$Questions = new couchClient($couchUrl, $dbNames['questions']); 
//global $Feedback;
//$Feedback = new couchClient($couchUrl, $dbNames['feedback']);
//global $Groups;
//$Groups = new couchClient($couchUrl, $dbNames['groups']);
//global $Facilities;
//$Facilities = new couchClient($couchUrl, $dbNames['facilities']);
?>