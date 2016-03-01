
/* posible action:
 * enter -> update and create if not exist DOM elem.
 * exit -> select not needed DOM obj.
 * update -> have the same elements ammounts!
 */
var canvas = d3.select("#visualisation")
        .append("svg")
        .attr("width", 300)
        .attr("height", 300);

var circle1 = canvas.append("circle")
        .attr("cx", 100)
        .attr("cy", 100)
        .attr("r", 20);

var circle2 = canvas.append("circle")
        .attr("cx", 10)
        .attr("cy", 10)
        .attr("r", 10);
var color = function (id) {
    if (id == 0) {
        return "blue";
    } else {
        return "black";
    }
};

canvas.selectAll("circle")
        .transition()
        .attr("fill", "blue")
        .duration(1500)
        .transition()
        .each("start", function (d, i) {
            d3.select(this).attr("fill", "red");
        })
        .delay(2000)
        .duration(1500)
        .attr("cx", 250)
        .transition()
        .duration(3000)
        .attr("cy", 150)
        .each("end", function (d, i) {
            d3.select(this).attr("fill", color(i));
        });