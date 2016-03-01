d3.json("./data/rawData.json", function (data) {
    $("div#json").prepend(data.reportType + "<br>");

    var canvas = d3.select("div#json")
            .append("svg")
            .attr("width", 300)
            .attr("height", 300);

    canvas.selectAll("rect")
            .data(data.people)
            .enter()    //add new!
            .append("rect")
            .attr("width", function (d) {
                return d.age * 10;
            })
            .attr("height", 20)
            .attr("y", function (d, i) {
                return 25 * i;
            })
            .attr("fill", "blue")
            .attr("id", function (d, i) {
                return i;
            })
            .on("click", circle_onClick2);

    canvas.selectAll("text")
            .data(data.people)
            .enter()
            .append("text")
            .text(function (d) {
                return d.name + " (" + d.age + ")";
            })
            .attr("y", function (d, i) {
                return 25 * i + 14;
            })
            .attr("x", function (d) {
                return d.age * 10 + 5;
            })
            .attr("fill", "black")
            .attr("id", function (d, i) {
                return i;
            })

    //$("rect#0").off("click");
    $("rect#0").click(function (evnt) {
        circle_onClick_jeden(evnt)
    });

});
function circle_onClick2() {
    var svgobj = d3.event.target;
    svgobj.style.opacity = 0.3;
    console.log("Rectangle no " + svgobj.getAttribute("id") + " on click even");
    d3.event.stopPropagation();
}

$("p#dwa").click(function () {
    $("div#json").slideDown(1000);
});
function circle_onClick_jeden(evnt) {
    var svgobj = evnt.target;
    $("div#json").slideUp(1000);
    svgobj.style.opacity = 0.9;
    console.log("jeden " + svgobj.getAttribute("id") + " on click even");
}
;