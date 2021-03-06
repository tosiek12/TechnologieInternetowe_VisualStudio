﻿<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard 1111</title>

        <!-- Stylesheets: -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <!-- Scripts -->
        <script type="text/javascript" src="js/d3.min.js"></script>
        <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js_Sharepoint/sharepointCommunication.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="myNavBar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="colapse" data-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="" class="navbar-brand"> ReconDashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#done">Done</a></li>
                        <li><a href="#inProgress">In progress</a></li>
                        <li><a href="#overdue">Overdue</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="jumbotron" id="myHeader">
            <div class="container text-center">
                <h2>Recon dashboard</h2>
                <a href="#none" class="btn btn-lg btn-warning">Trolo</a>
                <a href="#none" class="btn btn-lg btn-info">trolo2</a>    
                <a href="#none" class="btn btn-lg btn-danger">trolo2234</a> 
            </div>
        </div>

        <div class="container text-center" id="myBody">
            <section>
                <div id="result" class="row">

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label for="selectCountry">Country:</label>
                                <select size="1" id="selectCountry" class="form-control" >
                                    <option>Poland</option>
                                    <option>Germany</option>
                                    <option>Turkey</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="row alert-info">
                    <p id="dwa"> This is paragraph2</p>
                </div>

                <div class="row alert-dismissable">
                    <div class="col-md-8 col-xs-12" id="processMap" >
                        there will be process map. <br/>
                        <map id="imgmap" name="imgmap">
                            <area shape="rect" alt="0" title="" coords="173,186,220,218" href="#imgmap" target="_self" />
                            <area shape="rect" alt="1" title="" coords="82,106,131,137" href="#imgmap" target="_self" />
                            <area shape="rect" alt="2" title="" coords="251,268,302,296" href="#imgmap" target="_self" />
                            <area shape="rect" alt="3" title="" coords="368,350,411,377" href="#imgmap" target="_self" />
                            <area shape="rect" alt="4" title="" coords="364,105,414,136" href="#imgmap" target="_self" />
                            <area shape="rect" alt="5" title="" coords="483,352,527,375" href="#imgmap" target="_self" />
                        </map>
                        <img class=".img-rounded" src="img/swimlane_flowchart.png" alt="Process map" width="600" height="424" usemap="#imgmap" />
                    </div>
                    <div class="col-md-4 col-xs-12 table-responsive " >
                        <p><b>R-Close State</b></p>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Done</th>
                                    <th>Overdue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Poland</td>
                                    <td>1/10</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Turkey</td>
                                    <td>5/15</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Germany</td>
                                    <td>15/15</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row alert-info">
                    <div class="col-lg-4 col-md-6 " id="simpleCanvas" >
                        Simple canvas shapes.
                        <script src="js/D3_1_simpleCanvas.js"></script> 
                    </div>
                    <div id="json" class="col-lg-4 col-md-6 ">
                        <!-- <script src="js/D3_3_Transitions.js"></script> -->
                        <script src="js/D3_4_jsonAndEvents.js"></script>
                    </div>
                    <div id="linePlot" class="col-lg-4 col-md-6 ">
                        <script src="js/D3_5_LinePlot.js"></script>
                    </div>
                </div>

                <div class="row alert-success">
                    <div class="col-md-12">
                        <div class="tabbable tabs-left">
                            <ul class="nav nav-tabs  nav-stacked">
                                <li class="active"><a href="#arc1" data-toggle="tab">Circle</a><li>
                                <li class=""><a href="#arc2" data-toggle="tab">Pie Chart</a><li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="arc1">
                                    <p>Circle:</p>
                                </div>

                                <div class="tab-pane fade in " id="arc2">
                                    <p>Pie chart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var canvas = d3.select("#arc1")
                                .append("svg")
                                .attr("width", 200)
                                .attr("height", 200);

                        var group = canvas.append("g")
                                .attr("transform", "translate(100,100)");

                        var r = 75;
                        var pi = Math.PI;

                        var circle = d3.svg.arc()
                                .innerRadius(r - 10)
                                .outerRadius(r)
                                .startAngle(0)
                                .endAngle(pi * 2);

                        group
                                .append("path")
                                .attr("d", circle)
                                .attr("fill", "solid")
                                .attr("stroke", "green")
                                .attr("stroke-width", 2);
                    </script>
                    
                    <script type="text/javascript">
                        var color = d3.scale.ordinal()
                                .range(["blue", "red", "orange"]);

                        var data = [10, 50, 100];
                        var r = 75;

                        var canvas2 = d3.select("#arc2")
                                .append("svg")
                                .attr("width", 200)
                                .attr("height", 200);

                        var group = canvas2.append("g")
                                .attr("transform", "translate(100,100)");

                        var arc = d3.svg.arc()
                                .innerRadius(0)
                                .outerRadius(r);

                        var pie = d3.layout.pie()
                                .value(function (d) {
                                    return d;
                                });

                        var arcs = group.selectAll(".arc")
                                .data(pie(data))
                                .enter()
                                .append("g")
                                .attr("class", "arc");

                        arcs.append("path")
                                .attr("d", arc)
                                .attr("fill", function (d, i) {
                                    return color(d.data);
                                });
                        arcs.append("text")
                                .attr("transform", function (d) {
                                    return "translate(" + arc.centroid(d) + ")";
                                })
                                .attr("text-anchor", "middle")
                                .attr("font-size", "10x")
                                .text(function (d) {
                                    return d.data;
                                });

                    </script>
                </div>

                <!--
                <div id="visualisation" class="alert-info" style="border: solid black; border-width:thin">
                    Data visualisation!<br><br>
                    <script src="js/D3_2_simpleChart.js"></script>
                </div>
                -->
            </section>
        </div>

        <script src="js/jquery.rwdImageMaps.js"></script>
        <script>
            $(document).ready(function (e) {

                $('img[usemap]').rwdImageMaps();
                $('area').on('click', function () {
                    alert($(this).attr('alt') + ' clicked');
                });


                // div#tree2
                testReceiving();

            });

        </script>
        <script src="js/jquery_use.js"></script>
    </body>

</html>
