/*
var ccx = 50; // cell count x
var ccy = 25; // cell count y
var cw = 25; // cellWidth
var ch = 25;  // cellHeight
var xs = d3.scale.linear().domain([0, ccx]).range([0, ccx * cw]);
var ys = d3.scale.linear().domain([0, ccy]).range([0, ccy * ch]);
var states = new Array();
var color1 = "#0074D9";
var color2 = "#ffffff";
var del = 100;

function Conway(){ }

Conway.prototype.init = function(){

	d3.range(ccx).forEach(function(x) { 
		states[x] = new Array();
		d3.range(ccy).forEach(function(y) {
			states[x][y] = Math.random() > .8 ? true : false
		})
	})

	var vis = d3.select("body")
	.append("svg:svg")
	.attr("class", "vis")
	.attr("width", window.innerWidth)
	.attr("height", window.innerHeight);

	function toGrid(states) {
		var g = []			
		for (x = 0; x < ccx; x++) {
			for (y = 0; y < ccy; y++) {
				g.push({"x": x, "y": y, "state": states[x][y]})
			}
		}				
		return g
	}

	var self = this;
	vis.selectAll("rect")
		.data(function() { return toGrid(states) })
	  .enter().append("svg:rect")
		.attr("stroke", "none")
		.attr("fill", function(d) { return d.state ? color1 : color2 })
		.attr("x", function(d) { return xs(d.x) })
		.attr("y", function(d) { return ys(d.y) })
		.attr("width", cw)
		.attr("height", ch);
}

Conway.prototype.toGrid = function(states) {
	var g = []			
	for (x = 0; x < ccx; x++) {
		for (y = 0; y < ccy; y++) {
			g.push({"x": x, "y": y, "state": states[x][y]})
		}
	}				
	return g
}

Conway.prototype.animate = function() {

	//TODO Remove
	function toGrid(states) {
		var g = []			
		for (x = 0; x < ccx; x++) {
			for (y = 0; y < ccy; y++) {
				g.push({"x": x, "y": y, "state": states[x][y]})
			}
		}				
		return g
	}

	function createNewGeneration() {
		var nextGen = new Array()

		for (x = 0; x < ccx; x++) {
			nextGen[x] = new Array()
			for (y = 0; y < ccy; y++) {
				var ti = y - 1 < 0 ? ccy - 1 : y - 1
				var ri = x + 1 == ccx ? 0 : x + 1
				var bi = y + 1 == ccy ? 0 : y + 1
				var li = x - 1 < 0 ? ccx - 1 : x - 1
				
				var thisState = states[x][y]
				var liveNeighbours = 0
				liveNeighbours += this.states[li][ti] ? 1 : 0
				liveNeighbours += this.states[x][ti] ? 1 : 0
				liveNeighbours += this.states[ri][ti] ? 1 : 0
				liveNeighbours += this.states[li][y] ? 1 : 0
				liveNeighbours += this.states[ri][y] ? 1 : 0
				liveNeighbours += this.states[li][bi] ? 1 : 0
				liveNeighbours += this.states[x][bi] ? 1 : 0
				liveNeighbours += this.states[ri][bi] ? 1 : 0
				
				var newState = false
				
				if (thisState) {
					newState = liveNeighbours == 2 || liveNeighbours == 3 ? true : false
				} else {
					newState = liveNeighbours == 3 ? true : false
				}
				
				nextGen[x][y] = newState;
			}
		}
		
		return nextGen;
	}

	function run() {
		states = createNewGeneration();
		d3.selectAll("rect")
			.data(toGrid(states))
		  .transition()
			.attr("fill", function(d) { return d.state ? color1 : color2 })
			.delay(del)
			.duration(100)		
	}

	setInterval(run, del);
}
*/

function Conway(){

	var ccx = 50, // cell count x
		ccy = 25, // cell count y
		cw = 25, // cellWidth
		ch = 25,  // cellHeight
		del =100,
		xs = d3.scale.linear().domain([0,ccx]).range([0,ccx * cw]),
		ys = d3.scale.linear().domain([0,ccy]).range([0,ccy * ch]),
		states = new Array(),
		color1 = "#0074D9",
		color2 = "#ffffff";

	d3.range(ccx).forEach(function(x) { 
		states[x] = new Array()
		d3.range(ccy).forEach(function(y) {
			states[x][y] = Math.random() > .8 ? true : false
		})
	})

	function toGrid(states) {
		var g = []			
		for (x = 0; x < ccx; x++) {
			for (y = 0; y < ccy; y++) {
				g.push({"x": x, "y": y, "state": states[x][y]})
			}
		}				
		return g
	}

	var vis = d3.select("body")
		.append("svg:svg")
		.attr("class", "vis")
		.attr("width", window.innerWidth)
		.attr("height", window.innerHeight)					
		
	vis.selectAll("rect")
		.data(function() { return toGrid(states) })
	  .enter().append("svg:rect")
		.attr("stroke", "none")
		.attr("fill", function(d) { return d.state ? color1 : color2 })
		.attr("x", function(d) { return xs(d.x) })
		.attr("y", function(d) { return ys(d.y) })
		.attr("width", cw)
		.attr("height", ch)

	function createNewGeneration() {
		var nextGen = new Array()

		for (x = 0; x < ccx; x++) {
			nextGen[x] = new Array()
			for (y = 0; y < ccy; y++) {
				var ti = y - 1 < 0 ? ccy - 1 : y - 1
				var ri = x + 1 == ccx ? 0 : x + 1
				var bi = y + 1 == ccy ? 0 : y + 1
				var li = x - 1 < 0 ? ccx - 1 : x - 1
				
				var thisState = states[x][y]
				var liveNeighbours = 0
				liveNeighbours += states[li][ti] ? 1 : 0
				liveNeighbours += states[x][ti] ? 1 : 0
				liveNeighbours += states[ri][ti] ? 1 : 0
				liveNeighbours += states[li][y] ? 1 : 0
				liveNeighbours += states[ri][y] ? 1 : 0
				liveNeighbours += states[li][bi] ? 1 : 0
				liveNeighbours += states[x][bi] ? 1 : 0
				liveNeighbours += states[ri][bi] ? 1 : 0
				
				var newState = false
				
				if (thisState) {
					newState = liveNeighbours == 2 || liveNeighbours == 3 ? true : false
				} else {
					newState = liveNeighbours == 3 ? true : false
				}
				
				nextGen[x][y] = newState
			}
		}
		
		return nextGen
	}

	function animate() {
		states = createNewGeneration()
		d3.selectAll("rect")
			.data(toGrid(states))
		  .transition()
			.attr("fill", function(d) { return d.state ? color1 : color2 })
			.delay(del)
			.duration(100)
	}
	
	setInterval(animate, del)

}
