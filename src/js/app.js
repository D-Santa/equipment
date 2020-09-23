import $$ from 'dom7';
import Framework7 from 'framework7/framework7.esm.bundle.js';
// Import F7 Styles
import 'framework7/css/framework7.bundle.css';

// Import Icons and App Custom Styles
import '../css/icons.css';
import '../css/app.css';

// Import Routes
import routes from './routes.js';

var app = new Framework7({
  root: '#app', // App root element

  name: 'Equipment', // App name
  theme: 'aurora', // Automatic theme detection
  touch: { 
    disableContextMenu: true,
    },
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
		id:"0",
      },
	  peremen:{
		lock:"0",
		item:[],
		schet:1,
    put:"home",
    type:{
      id:0,
      name:""
    }
    },
    sql:[],

    };
  },
   panel: {
        leftBreakpoint: 1024,
      },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,
});

