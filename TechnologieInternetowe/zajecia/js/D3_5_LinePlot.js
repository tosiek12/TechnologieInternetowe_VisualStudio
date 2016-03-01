d3.json("data/linePlot.json", function (data) {

    $("div#linePlot").prepend(data.reportType + "<br>");
    var xScale = d3.scale.linear()
            .domain([0, 10])//input val range [min,max]
            .range([50, 250]);//result val range
    var yScale = d3.scale.linear()
            .domain([0, 100])//input val range [min,max]
            .range([250, 50]);//result val range

    var canvas = d3.select("div#linePlot")
            .append("svg")
            .attr("width", 300)
            .attr("height", 300);

    var line = d3.svg.line()
            .x(function (d) {
                return xScale(d.x);
            })
            .y(function (d) {
                return yScale(d.y);
            });

    canvas.append("g").selectAll("path")
            .data([data.points])
            .enter()
            .append("path")
            .attr("d", line)
            .attr("fill", "none")
            .attr("stroke", "green")
            .attr("stroke-width", 3);

    var xAxis = d3.svg.axis()
            .orient("bottom")
            .scale(xScale);

    var yAxis = d3.svg.axis()
            .scale(yScale)
            .orient("left");

    canvas.append("g")
            .attr("transform", "translate(0,250)")
            .call(xAxis)
            .attr("class", "axis");

    canvas.append("g")
            .attr("transform", "translate(50,0)")
            .call(yAxis)
            .attr("class", "axis");
});