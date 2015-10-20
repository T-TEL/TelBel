<?php
$menu ="";
if(isset($_SESSION['mtc_U_Priv']) && intval($_SESSION['mtc_U_Priv'])>0){
	switch(intval($_SESSION['mtc_U_Priv'])){
		//////// 1 //////// Sales Desk
		///system_user='.$_SESSION['mtc_U_Name'].'&
		case 1:
			$menu = '<h3>Sales</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=sell_item&loc=Sell Item">Sell Item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=queued_Items4_Sale&loc=Queued for sale item">Queued for sale item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=SearchItem_under_Sold&loc=Search for sold item">Search for Sold With IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Search_Sold_Reciept&loc=Search sold item with receipt No">Search for Sold With Receipt</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=repairs_income&loc=Daily Repair Cost">Income From Repairs</a></li>
		</ul>
		<h3>Stock</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=addToStock&loc=Add to stock">Add to stock</a></li>
            <li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=UpdateItem_InfoInStock&loc=Update Item Info. In Stock">Update Item rec. in stock</a></li>			
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock&loc=Available Stock">Available Stock</a></li>
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock_not_queued&loc=Available Stock Without Queued Items">Available Stock (Not Queued)</a></li>
		</ul>
		<h3>Report</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_summery&loc=Report">General Report</a></li>
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_log_summery&loc=Report">Logged Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=Debtors">Debtors Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_soldItems&loc=Sold Items Report">Sold Items Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=list_All_Customers&loc=Customer List">Customer List</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_action_log&loc=System Action Log">System Log</a></li>

		</ul>
		 <h3>Transactions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_Info&loc=Customer\'s Info">Customer\'s Info</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_history&loc=Customer\'s History">Customer\'s History</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_DebitRecords&loc=Update Debt Records">Check Customer Debt Staus</a></li>
             <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=List All Debtors">List All Debtors</a></li>
		</ul>
		<h3>Statistics</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock&loc=Repaired From Faulty">Receieved and Repaired</a></li>
            	<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock_notReapired&loc=Not Repaired">Receieved and not Repaired</a></li>
                <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=all_Sold_By_Model&loc=all Items Sold between a specific Period">All Items Sold by Model</a></li>
		</ul>
        <h3>Graphs</h3>
        <ul class="toggle">
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_sales_made&loc=Sold Item Query">Sold Item Graph</a></li>
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_repaired_items&loc=Sold Item Query">Repaired Items Graph</a></li>
        </ul>
		<h3>Repair</h3>
		<ul class="toggle">
        	<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=new_faulty_item&loc=Add New Faulty Item">Add New Faulty Item</a></li>
           <li class="icn_photo"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateRepair&loc=Update Faulty Item">Update Faulty Item</a></li>
           <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_RepairCode&loc=Search for faulty with repair code">Search Faulty Item with Repair Code</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty&loc=Search for Parts">Search Faulty Item By IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_Receipt&loc=Search for Parts">Search Faulty By Receipt</a></li>
		</ul>
		 <h3>Promotions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=promotions_Sold_1&loc=Eligible for renewal">Eligible for renewal</a></li>
		</ul>
		<h3>Settings</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateSelectables&loc=Update Selectables">Update Selectables</a></li>
		</ul>
		';
		break;
		
		//////// 2 //////// Tech Repair guy
		case 2:
			$menu = '
		<h3>Stock</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=addToStock&loc=Add to stock" >Add to stock</a></li>
			<li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=importToStock&loc=Import to Stock" >Import to Stock</a></li>
            <li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=UpdateItem_InfoInStock&loc=Update Item Info. In Stock">Update Item rec. in stock</a></li>			
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock&loc=Available Stock">Available Stock</a></li>
		</ul>
		<h3>Report</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_summery&loc=Report">General Report</a></li>
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_log_summery&loc=Report">Logged Report</a></li>
          <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=Debtors">Debtors Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_soldItems&loc=Sold Items Report">Sold Items Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=list_All_Customers&loc=Customer List">Customer List</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_action_log&loc=System Action Log">System Log</a></li>

		</ul>
		<h3>Advance Sys. Setting</h3>
        <ul class="toggle">
     <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_ItemsIndStock_By_Model&loc=Delete From Stock Item Database">Delete Stock List</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_RepairedItems_By_Model&loc=Delet From Repaired Items">Delete Repaired Records</a></li>
        </ul>
		 <h3>Transactions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_Info&loc=Customer\'s Info">Customer\'s Info</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_history&loc=Customer\'s History">Customer\'s History</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_DebitRecords&loc=Update Debt Records">Check Customer Debt Staus</a></li>
             <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=List All Debtors">List All Debtors</a></li>
		</ul>
		<h3>Statistics</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock&loc=Repaired From Faulty">Receieved and Repaired</a></li>
            	<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock_notReapired&loc=Not Repaired">Receieved and not Repaired</a></li>
                <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=all_Sold_By_Model&loc=all Items Sold between a specific Period">All Items Sold by Model</a></li>
		</ul>
        <h3>Graphs</h3>
        <ul class="toggle">
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_sales_made&loc=Sold Item Query">Sold Item Graph</a></li>
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_repaired_items&loc=Sold Item Query">Repaired Items Graph</a></li>
        </ul>
		<h3>Repair</h3>
		<ul class="toggle">
        	<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=new_faulty_item&loc=Add New Faulty Item">Add New Faulty Item</a></li>
           <li class="icn_photo"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateRepair&loc=Update Faulty Item">Update Faulty Item</a></li>
           <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_RepairCode&loc=Search for faulty with repair code">Search Faulty Item with Repair Code</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty&loc=Search for Parts">Search Faulty Item By IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_Receipt&loc=Search for Parts">Search Faulty By Receipt</a></li>
		</ul>
		 <h3>Promotions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=promotions_Sold_1&loc=Eligible for renewal">Eligible for renewal</a></li>
		</ul>
		<h3>Settings</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateSelectables&loc=Update Selectables">Update Selectables</a></li>
		</ul>
       
        
        
		';
		break;
		
		//////// 3 //////// Business marketing Guy
		case 3:
			$menu = '<h3>Sales</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=sell_item&loc=Sell Item">Sell Item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=queued_Items4_Sale&loc=Queued for sale item">Queued for sale item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=SearchItem_under_Sold&loc=Search for sold item">Search for Sold With IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Search_Sold_Reciept&loc=Search sold item with receipt No">Search for Sold With Receipt</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=repairs_income&loc=Daily Repair Cost">Income From Repairs</a></li>
		</ul>
		<h3>Stock</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=addToStock&loc=Add to stock" >Add to stock</a></li>
			<li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=importToStock&loc=Import to Stock" >Import to Stock</a></li>
            <li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=UpdateItem_InfoInStock&loc=Update Item Info. In Stock">Update Item rec. in stock</a></li>			
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock&loc=Available Stock">Available Stock</a></li>
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock_not_queued&loc=Available Stock Without Queued Items">Available Stock (Not Queued)</a></li>
		</ul>
		<h3>Report</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_summery&loc=Report">General Report</a></li>
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_log_summery&loc=Report">Logged Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=Debtors">Debtors Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_soldItems&loc=Sold Items Report">Sold Items Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=list_All_Customers&loc=Customer List">Customer List</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_action_log&loc=System Action Log">System Log</a></li>

		</ul>
		<h3>Advance Sys. Setting</h3>
        <ul class="toggle">
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_Sold_By_Model&loc=Delete From Sold Items Database">Delete Sales Rec.</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_ItemsIndStock_By_Model&loc=Delete From Stock Item Database">Delete Stock List</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_RepairedItems_By_Model&loc=Delet From Repaired Items">Delete Repaired Records</a></li>
        </ul>
		 <h3>Transactions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_Info&loc=Customer\'s Info">Customer\'s Info</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_history&loc=Customer\'s History">Customer\'s History</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_DebitRecords&loc=Update Debt Records">Check Customer Debt Staus</a></li>
             <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=List All Debtors">List All Debtors</a></li>
		</ul>
		<h3>Statistics</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock&loc=Repaired From Faulty">Receieved and Repaired</a></li>
            	<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock_notReapired&loc=Not Repaired">Receieved and not Repaired</a></li>
                <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=all_Sold_By_Model&loc=all Items Sold between a specific Period">All Items Sold by Model</a></li>
		</ul>
        <h3>Graphs</h3>
        <ul class="toggle">
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_sales_made&loc=Sold Item Query">Sold Item Graph</a></li>
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_repaired_items&loc=Sold Item Query">Repaired Items Graph</a></li>
        </ul>
		<h3>Repair</h3>
		<ul class="toggle">
        	<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=new_faulty_item&loc=Add New Faulty Item">Add New Faulty Item</a></li>
           <li class="icn_photo"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateRepair&loc=Update Faulty Item">Update Faulty Item</a></li>
           <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_RepairCode&loc=Search for faulty with repair code">Search Faulty Item with Repair Code</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty&loc=Search for Parts">Search Faulty Item By IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_Receipt&loc=Search for Parts">Search Faulty By Receipt</a></li>
		</ul>
		 <h3>Promotions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=promotions_Sold_1&loc=Eligible for renewal">Eligible for renewal</a></li>
		</ul>
		<h3>Settings</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateSelectables&loc=Update Selectables">Update Selectables</a></li>
		</ul>
       
        
        
		';
		break;
		
		//////// 4 //////// Sock management guy
		case 4:
			$menu = '<h3>Sales</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=sell_item&loc=Sell Item">Sell Item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=queued_Items4_Sale&loc=Queued for sale item">Queued for sale item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=SearchItem_under_Sold&loc=Search for sold item">Search for Sold With IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Search_Sold_Reciept&loc=Search sold item with receipt No">Search for Sold With Receipt</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=repairs_income&loc=Daily Repair Cost">Income From Repairs</a></li>
		</ul>
		<h3>Stock</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=addToStock&loc=Add to stock" >Add to stock</a></li>
			<li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=importToStock&loc=Import to Stock" >Import to Stock</a></li>
            <li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=UpdateItem_InfoInStock&loc=Update Item Info. In Stock">Update Item rec. in stock</a></li>			
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock&loc=Available Stock">Available Stock</a></li><li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock_not_queued&loc=Available Stock Without Queued Items">Available Stock (Not Queued)</a></li>
		</ul>
		<h3>Report</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_summery&loc=Report">General Report</a></li>
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_log_summery&loc=Report">Logged Report</a></li>
          <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=Debtors">Debtors Report</a></li>
            <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_soldItems&loc=Sold Items Report">Sold Items Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=list_All_Customers&loc=Customer List">Customer List</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_action_log&loc=System Action Log">System Log</a></li>

		</ul>
		<h3>Advance Sys. Setting</h3>
        <ul class="toggle">
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_Sold_By_Model&loc=Delete From Sold Items Database">Delete Sales Rec.</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_ItemsIndStock_By_Model&loc=Delete From Stock Item Database">Delete Stock List</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_RepairedItems_By_Model&loc=Delet From Repaired Items">Delete Repaired Records</a></li>
        </ul>
		 <h3>Transactions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_Info&loc=Customer\'s Info">Customer\'s Info</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_history&loc=Customer\'s History">Customer\'s History</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_DebitRecords&loc=Update Debt Records">Check Customer Debt Staus</a></li>
             <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=List All Debtors">List All Debtors</a></li>
		</ul>
		<h3>Statistics</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock&loc=Repaired From Faulty">Receieved and Repaired</a></li>
            	<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock_notReapired&loc=Not Repaired">Receieved and not Repaired</a></li>
                <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=all_Sold_By_Model&loc=all Items Sold between a specific Period">All Items Sold by Model</a></li>
		</ul>
        <h3>Graphs</h3>
        <ul class="toggle">
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_sales_made&loc=Sold Item Query">Sold Item Graph</a></li>
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_repaired_items&loc=Sold Item Query">Repaired Items Graph</a></li>
        </ul>
		<h3>Repair</h3>
		<ul class="toggle">
        	<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=new_faulty_item&loc=Add New Faulty Item">Add New Faulty Item</a></li>
           <li class="icn_photo"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateRepair&loc=Update Faulty Item">Update Faulty Item</a></li>
           <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_RepairCode&loc=Search for faulty with repair code">Search Faulty Item with Repair Code</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty&loc=Search for Parts">Search Faulty Item By IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_Receipt&loc=Search for Parts">Search Faulty By Receipt</a></li>
		</ul>
		 <h3>Promotions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=promotions_Sold_1&loc=Eligible for renewal">Eligible for renewal</a></li>
		</ul>
		<h3>Settings</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateSelectables&loc=Update Selectables">Update Selectables</a></li>
		</ul>
		';
		break;
		
		//////// 5 //////// Administrator
		case 5:
		$menu = '<h3>Sales</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=sell_item&loc=Sell Item">Sell Item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=queued_Items4_Sale&loc=Queued for sale item">Queued for sale item</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=SearchItem_under_Sold&loc=Search for sold item">Search for Sold With IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Search_Sold_Reciept&loc=Search sold item with receipt No">Search for Sold With Receipt</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=repairs_income&loc=Daily Repair Cost">Income From Repairs</a></li>
		</ul>
		<h3>Stock</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updatePriceList&loc=Update Price List" >Update Prices </a></li>
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=addToStock&loc=Add to stock" >Add to stock</a></li>
			<li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=importToStock&loc=Import to Stock" >Import to Stock</a></li>
            <li class="icn_security"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=UpdateItem_InfoInStock&loc=Update Item Info. In Stock">Update Item rec. in stock</a></li>			
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock&loc=Available Stock">Available Stock</a></li>
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_stock_not_queued&loc=Available Stock Without Queued Items">Available Stock (Not Queued)</a></li>
		</ul>
		<h3>Report</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_summery&loc=Report">General Report</a></li>
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_master_log_summery&loc=Report">Logged Report</a></li>
         <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=Debtors">Debtors Report</a></li>
            <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_soldItems&loc=Sold Items Report">Sold Items Report</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=list_All_Customers&loc=Customer List">Customer List</a></li>
           <li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=report_action_log&loc=System Action Log">System Log</a></li>
		</ul>
		<h3>Advance Sys. Setting</h3>
        <ul class="toggle">
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_Sold_By_Model&loc=Delete From Sold Items Database">Delete Sales Rec.</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_ItemsIndStock_By_Model&loc=Delete From Stock Item Database">Delete Stock List</a></li>
      <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=delete_all_RepairedItems_By_Model&loc=Delet From Repaired Items">Delete Repaired Records</a></li>
        </ul>
		 <h3>Transactions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_Info&loc=Customer\'s Info">Customer\'s Info</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_history&loc=Customer\'s History">Customer\'s History</a></li>
            <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=Customer_DebitRecords&loc=Update Debt Records">Check Customer Debt Staus</a></li>
             <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=List_All_Debitors&loc=List All Debtors">List All Debtors</a></li>
		</ul>
		<h3>Statistics</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock&loc=Repaired From Faulty">Receieved and Repaired</a></li>
            	<li class="icn_categories"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=available_for_repair_stock_notReapired&loc=Not Repaired">Receieved and not Repaired</a></li>
                <li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=all_Sold_By_Model&loc=all Items Sold between a specific Period">All Items Sold by Model</a></li>
		</ul>
        <h3>Graphs</h3>
        <ul class="toggle">
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_sales_made&loc=Sold Item Query">Sold Item Graph</a></li>
        <li class="icn_settings"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=gph_repaired_items&loc=Sold Item Query">Repaired Items Graph</a></li>
        </ul>
		<h3>Repair</h3>
		<ul class="toggle">
        	<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=new_faulty_item&loc=Add New Faulty Item">Add New Faulty Item</a></li>
           <li class="icn_photo"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateRepair&loc=Update Faulty Item">Update Faulty Item</a></li>
           <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_RepairCode&loc=Search for faulty with repair code">Search Faulty Item with Repair Code</a></li>
			<li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty&loc=Search for Parts">Search Faulty Item By IMEI</a></li>
            <li class="icn_view_users"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=search_faulty_by_Receipt&loc=Search for Parts">Search Faulty By Receipt</a></li>
		</ul>
		 <h3>Promotions</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=promotions_Sold_1&loc=Eligible for renewal">Eligible for renewal</a></li>
		</ul>
		<h3>Settings</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=updateSelectables&loc=Update Selectables">Update Selectables</a></li>
			<li class="icn_new_article"><a href="pageLoader.php?system_user='.$_SESSION['mtc_U_Name'].'&page=create_new_user&loc=Manage System Users">Manage System User Accounts</a></li>
			
		</ul>
       
        
        
		';
		break;
	}
	
} else{
	$mystring = "index.php?login=session expired - Login again";
	die('<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$mystring.'">');
}
?>