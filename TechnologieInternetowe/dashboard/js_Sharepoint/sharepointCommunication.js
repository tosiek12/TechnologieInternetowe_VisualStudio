function testReceiving() {
    var sSite = "https://arcconsulting365.sharepoint.com/sites/dev_at/testEnv";
    var listType;
    listType = "Tasks";

    //First - short List:
    var listname = "transactionMapping";
    var lisGuid = "guid:cda72062-6135-4823-aabd-24feb4fc4d2b";
    var id = "";
    var fields = "Title,DeterminantsValues";
    //Second - Long List:
    if (listType.indexOf("long") >=0 ) {
        listname = "test";
        lisGuid = "guid:2F4C3BDE-04F6-43BF-8AE2-EE17F9796F58";
        id = "";
        fields = "Title";
    }
    else if (listType.indexOf("Tasks") >= 0) {
        listname = "Tasks";
        lisGuid = "F727142F-1B97-485D-8614-C3AB5361B772";
        id = "";
        fields = "Title,Estimated_x0020_Time,TargetAudienceMineId";
    }

    getListItem(sSite, listname, id, fields, handler_showResultsInTable);
    //getListItem(sSite,lisGuid ,id, "");
}
var gRes;  
function handler_showResultsInTable(data) {
    var results;
    if (data.hasOwnProperty("d")) {
        if (data.d.hasOwnProperty("__next")) {
            console.log("threshold - next link founded: ", data.d.__next);
        }
        if (data.d.hasOwnProperty("results")) {
            results = data.d.results;
        } else {
            results= data.d;
        }
    } else {
        results = data;
        gRes = data;
    }


    var table;
    table = "<table class='table table-condensed table-responsive'>"
    table += "<thead><tr>"
    table += "<th>Lp.</th>"
    table += "<th>Title</th>"
    table += "<th>Estimated_x0020_Time</th>"
    table += "<th>TargetAudienceMineId</th>"
    table += "<th>done?</th>"
    table += "</tr></thead>"

    table += "<tbody>"
    console.log(results);
    for (el in results) {
        table += "<tr id='lp" + el + "' >"
        table += "<td>" + el + "</td>"
        table += "<td>" + results[el].Title + "</td>"
        table += "<td>" + results[el].Estimated_x0020_Time + "</td>"
        try {
            table += "<td>" + results[el].TargetAudienceMineId.results.join(',') + "</td>"
        } catch (err) {
            table += "<td>" + "" + "</td>"
        }
        table += "<td>" + "<label><input type='checkbox' value=''> done</label>" + "</td>"
        table += "</tr>"
    }
    table += "</tbody></table>"
    $("div#result").prepend(table);
}

//POST http://<sitecollection>/<site>/_api/web/lists/getByTitle(title)
function getListItem(url, listname, id, fields, handlerOnSuccess) {
    var address;

    if (listname.indexOf("guid") >= 0) {
        address = url + "/_api/web/lists('" + listname.split(":")[1] + "')";	//guid
    } else {
        address = url + "/_api/web/lists/getbytitle('" + listname + "')";	//list name
    };

    if (id.length == 0) {
        address = address + "/items?";
    } else {
        address = address + "/items(" + id + ")?";
    };

    var select;
    if (fields.length > 0) {
        address = address + "$select=" + fields + "";
    };
    //address  += "&$filter=substringof('sdf',Title)"
    //address  += "&$orderby=Title asc";
    address += "&$top=600";
    console.log(address);
    $.ajax({

        url: address,
        method: "GET",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        },
        headers: { "Accept": "application/json; odata=verbose" },
        success: function (data) {
            handler_showResultsInTable(data);
        },
        error: function (data) {
            console.log("error", data);
            $("div#result").prepend("<h2>errror: " +data.statusText + "<h2>");

        }
    });
};

function testSPobj() {
    //Test SP object 
    var ctx = SP.ClientContext.get_current();
    var selectedItems = SP.ListOperation.Selection.getSelectedItems(ctx);

    for (var i = 0; i < selectedItems.length; i++) {
        var itemId = selectedItems[i].id;
        console.log(itemId);
    };
}

function ajaxTest() {
    $.ajax({
        type: "POST",
        url: "http://trirand.com/blog/phpjqgrid/examples/jsonp/getjsonp.php?callback=?&qwery=longorders",
        datatype: "jsonp",
        success: function (resp) {
            console.log("GET google:", resp);
        },
        error: function () {
            alert("error in get google");
        }
    });

}

function ajaxTest2() {
    $.ajax({
        type: "GET",
        url: "https://maps.googleapis.com/maps/api/geocode/xml?sensor=false&address=Krakow",
        success: function (resp) {
            console.log("GET google:", resp);
        },
        error : function() {
            alert("error in get google");
        }
    });

    var sApiKey = "CsxxWN5xFUVkNgxqgixz";
    $.ajax({
        type: "GET",
        //url: "https://api.pickpoint.io/v1/forward?key=CsxxWN5xFUVkNgxqgixz&q=Krakow",
        url: "https://api.pickpoint.io/v1/forward?key=CsxxWN5xFUVkNgxqgixz&q=Krakow",
        success: function (resp) {
            console.log("Get pickpoint:", JSON.parse(resp));
        }
    });
                                    
                                    
    $.ajax({
        type: "POST",
        url:  "https://maps.googleapis.com/maps/api/geocode/json?address=Krakow+Krolewska+57&key=AIzaSyDungHSYXbX7TEQ6sjRmhQ1el84HgGznBc",
        success: function (resp) {
            console.log("POST googeDev: ", resp);
        }
    });
                                   
}