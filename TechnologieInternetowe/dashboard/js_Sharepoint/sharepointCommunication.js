function testReceiving() {
    var sSite = "https://arcconsulting365.sharepoint.com/sites/dev_at/testEnv";
    var listType = "short"

    //First - short List:
    var listname = "transactionMapping";
    var lisGuid = "guid:cda72062-6135-4823-aabd-24feb4fc4d2b";
    var id = "";
    var fields = "Title,DeterminantsValues";
    //Second - Long List:
    if (listType.indexOf("short") == -1) {
        listname = "test";
        lisGuid = "guid:2F4C3BDE-04F6-43BF-8AE2-EE17F9796F58";
        id = "";
        fields = "Title";
    }

    getListItem(sSite, listname, id, fields);
    //getListItem(sSite,lisGuid ,id, "");
}

//POST http://<sitecollection>/<site>/_api/web/lists/getByTitle(title)
function getListItem(url, listname, id, fields) {
    var address;

    if (listname.indexOf("guid") >= 0) {
        address = url + "/_api/web/lists('" + listname.split(":")[1] + "')";	//guid
    } else {
        address = url + "/_api/web/lists/getbytitle('" + listname + "')";	//list name
    };

    if (id.length == 0) {
        address = address + "/items";
    } else {
        address = address + "/items(" + id + ")";
    };

    var select;
    if (fields.length > 0) {
        address = address + "?$select=" + fields + "";
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

            $("div#result").prepend("succcess" + data.statusText + "<br>");
            if (data.d.hasOwnProperty("__next")) {
                console.log("threshold - next link founded: ", data.d.__next);
            }
            if (data.d.hasOwnProperty("results")) {
                console.log("succcess", data.d.results);
            } else {
                console.log("succcess", data.d);
            }
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