<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <!-- Stylesheets: -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <!-- Scripts -->
        <script type="text/javascript" src="js/d3.min.js"></script>
        <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js_Sharepoint/sharepointCommunication.js"></script>
        <script type="text/javascript" src="js_Sharepoint/sharepointAuthentication.js"></script>

        <!-- We support more than 40 localizations -->
        <script type="text/ecmascript" src="/dashboard/jqGrid/js/i18n/grid.locale-en.js"></script>
        <!-- This is the Javascript file of jqGrid -->
        <script type="text/ecmascript" src="/dashboard/jqGrid/js/jquery.jqGrid.min.js"></script>
        <!-- This is the localization file of the grid controlling messages, labels, etc.
        <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- The link to the CSS that the grid needs -->
        <link rel="stylesheet" type="text/css" media="screen" href="/dashboard/jqGrid/css/ui.jqgrid-bootstrap.css" />
        <script>
    		$.jgrid.defaults.width = 780;
        </script>


    </head>
<body>
    <div style="margin-left:20px">
        <table id="jqGrid"></table>
        <div id="jqGridPager"></div>
    </div>
    <script type="text/javascript">

        $(document).ready(function () {

            $("#jqGrid").jqGrid({
                url: 'http://trirand.com/blog/phpjqgrid/examples/jsonp/getjsonp.php?callback=?&qwery=longorders',
                mtype: "GET",
				styleUI : 'Bootstrap',
                datatype: "jsonp",
                colModel: [
                    { label: 'OrderID', name: 'OrderID', key: true, width: 75 },
                    { label: 'Customer ID', name: 'CustomerID', width: 150 },
                    { label: 'Order Date', name: 'OrderDate', width: 150 },
                    { label: 'Freight', name: 'Freight', width: 150 },
                    { label:'Ship Name', name: 'ShipName', width: 150 }
                ],
				viewrecords: true,
                height: 500,
                rowNum: 25,
                pager: "#jqGridPager"
            });
        });

    </script>
</body>

</html>
