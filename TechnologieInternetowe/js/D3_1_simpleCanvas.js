/*
 * using d3
 *
 * d3 is global obj 
 */

//D3 is loaded in html file!
var par;

par = d3.select("p");
par.text("new text");

d3.select("div#simpleCanvas").append("p").text("dynamically added part");

var canvas;
canvas = d3.select("div#simpleCanvas")
        .append("svg")
        .attr("width", 300)
        .attr("height", 200);

//canvas.attr("visible",false);

var circle = canvas.append("circle")
        .attr("cx", 100)
        .attr("cy", 100)
        .attr("r", 50)
        .attr("fill", "red");

var rect = canvas.append("rect")
        .attr("width", "100px")
        .attr("height", "1cm");

var line = canvas.append("line")
        .attr("x1", 0)
        .attr("y1", 0)
        .attr("x2", 100)
        .attr("y2", 100)
        .attr("stroke", "green")
        .attr("stroke-width", 5);

circle.on("click", circle_onClick);


function circle_onClick() {

    var svgobj = d3.event.target;
    svgobj.style.opacity = 0.3;
    svgobj.setAttribute("cx", Math.round(svgobj.getAttribute("cx") * 1.1));

    console.log("circle on click even");
    d3.event.stopPropagation();
}
