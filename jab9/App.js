
var Box = React.createClass({
  getInitialState: function() {
  	Conway();
    return {windowWidth: window.innerWidth};
  },

  handleResize: function(e) {
  	console.log("Resize");
  	Conway();
    this.setState({windowWidth: window.innerWidth});
  },

  componentDidMount: function() {
    window.addEventListener('resize', this.handleResize);
  },

  componentWillUnmount: function() {
    window.removeEventListener('resize', this.handleResize);
  },

  render: function() {
    return React.createElement("div", null, "App: ", this.props.name);
  }
});

ReactDOM.render(
	React.createElement(Box, {name: "React.js & D3.js to create Conway life game"}),
	document.getElementById('container')
);