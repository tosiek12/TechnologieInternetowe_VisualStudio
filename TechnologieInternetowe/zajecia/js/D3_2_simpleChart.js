var aData = [10, 100, 200, 300, 400];
var maxOfData = Math.max.apply(Math, aData);
var elmentsInData = aData.length;

var width = 400;
var height = (elmentsInData + 1) * 25;

var widthScale = d3.scale.linear()
        .domain([0, maxOfData])//input val range [min,max]
        .range([0, width]);//result val range

//heat map for color value!!
var colorScale = d3.scale.linear()
        .domain([0, maxOfData])//input val range [min,max]
        .range(["red", "blue"]);//result val range

var axis = d3.svg.axis()
        .ticks(8)
        .scale(widthScale);

var canvas = d3.select("#visualisation")
        .append("svg")
        .attr("width", width)
        .attr("height", height)
        .append("g")   //grup element!
        .attr("transform", "scale(1) translate(20,5)");


var bars = canvas.selectAll("rect")
        .data(aData)//bound data to empty selection ( or to all exiting rect allready)
        .enter()    //enter each placeholders - return new selection 
        .append("rect")
            //for each loop!
            .attr("width", function (d) {
                return widthScale(d);
            })  
            .attr("height", 20)
            .attr("fill", function (d, i) {
                return colorScale(d);
            })
            .attr("y", function (d, i) {
                return 25 * i;
            });    //data,index


canvas.append("g")
        .attr("transform", "translate(0," + elmentsInData * 25 + ")")
        .call(axis);
