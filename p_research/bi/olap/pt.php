<html>
	<head>
    <script type="text/javascript" src="test_page_files/data_vortex.js"></script>
    
    <script type="text/javascript" src="test_page_files/pivot_table.js"></script>
    <script type="text/javascript" src="test_page_files/gastax_data.js"></script>
    <link rel="stylesheet" type="text/css" href="test_page_files/pivot_table.css">	
	</head>
	<body>
	    <div id="mainArea">
      <div id="tableOne">
<table class="pivotTable">
<tbody>
<tr>
<th rowspan="1" colspan="2">
<input class="layoutButton" id="layoutButtonIntableOne" name="layout" value="Change Layout" type="button">
</th>
<th colspan="1">Greenbelt Alliance</th><th colspan="1">Inst. For TDP</th><th colspan="1">Intl. Bike Fund</th><th colspan="1">Nortwest Earth Inst.</th><th colspan="1">Plant-it 2020</th><th colspan="1">Rocky Mountain Inst.</th><th colspan="1">Nature Conservancy</th><th colspan="1">Trees for the Future</th><th colspan="1">Union of Con. Sci.</th></tr><tr><th rowspan="3">Pledged this year</th><th rowspan="1">2001</th><td class="odd">$61.46</td><td class="odd">$92.18</td><td class="odd">$178.22</td><td class="odd">$0.00</td><td class="odd">$98.33</td><td class="odd">$98.33</td><td class="odd">$98.33</td><td class="odd">$98.33</td><td class="odd">$135.20</td></tr><tr><th rowspan="1">2002</th><td class="odd">$113.96</td><td class="odd">$239.32</td><td class="odd">$199.43</td><td class="odd">$113.96</td><td class="odd">$170.94</td><td class="odd">$182.34</td><td class="odd">$182.34</td><td class="odd">$113.96</td><td class="odd">$222.23</td></tr><tr><th rowspan="1">2003</th><td class="odd">$84.10</td><td class="odd">$105.72</td><td class="odd">$138.16</td><td class="odd">$84.10</td><td class="odd">$105.72</td><td class="odd">$105.72</td><td class="odd">$116.54</td><td class="odd">$105.72</td><td class="odd">$127.35</td></tr><tr><th rowspan="3">Donated this year</th><th rowspan="1">2001</th><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$0.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td></tr><tr><th rowspan="1">2002</th><td class="even">$0.00</td><td class="even">$82.00</td><td class="even">$128.00</td><td class="even">$114.00</td><td class="even">$19.00</td><td class="even">$31.00</td><td class="even">$31.00</td><td class="even">$0.00</td><td class="even">$107.00</td></tr><tr><th rowspan="1">2003</th><td class="even">$0.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$0.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$0.00</td><td class="even">$250.00</td></tr><tr><th rowspan="3">Pledged to date</th><th rowspan="1">2001</th><td class="odd">$61.46</td><td class="odd">$92.18</td><td class="odd">$178.22</td><td class="odd">$0.00</td><td class="odd">$98.33</td><td class="odd">$98.33</td><td class="odd">$98.33</td><td class="odd">$98.33</td><td class="odd">$135.20</td></tr><tr><th rowspan="1">2002</th><td class="odd">$175.42</td><td class="odd">$331.50</td><td class="odd">$377.65</td><td class="odd">$113.96</td><td class="odd">$269.27</td><td class="odd">$280.67</td><td class="odd">$280.67</td><td class="odd">$212.29</td><td class="odd">$357.43</td></tr><tr><th rowspan="1">2003</th><td class="odd">$259.52</td><td class="odd">$437.23</td><td class="odd">$515.82</td><td class="odd">$198.06</td><td class="odd">$375.00</td><td class="odd">$386.39</td><td class="odd">$397.21</td><td class="odd">$318.02</td><td class="odd">$484.78</td></tr><tr><th rowspan="3">Donated to date</th><th rowspan="1">2001</th><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$0.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td><td class="even">$250.00</td></tr><tr><th rowspan="1">2002</th><td class="even">$250.00</td><td class="even">$332.00</td><td class="even">$378.00</td><td class="even">$114.00</td><td class="even">$269.00</td><td class="even">$281.00</td><td class="even">$281.00</td><td class="even">$250.00</td><td class="even">$357.00</td></tr><tr><th rowspan="1">2003</th><td class="even">$250.00</td><td class="even">$582.00</td><td class="even">$628.00</td><td class="even">$114.00</td><td class="even">$519.00</td><td class="even">$531.00</td><td class="even">$531.00</td><td class="even">$250.00</td><td class="even">$607.00</td></tr></tbody></table></div>

      </div>

    </div>
    <script>
  elementMainArea = document.getElementById("mainArea");
  numberOfCallsToDebug = 0;

  var gastaxVortex = makeGastaxDataVortex();
  var gastaxPivot  = new PivotTable("tableOne", gastaxVortex, [gastaxVortex.axisList[2], gastaxVortex.axisList[0]], [gastaxVortex.axisList[1]]);
gastaxPivot.display();    
    </script>
	<body>
</html>
