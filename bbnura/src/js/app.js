import $$ from 'dom7';
import Framework7 from 'framework7/framework7.esm.bundle.js';

// Import F7 Styles
import 'framework7/css/framework7.bundle.css';

// Import Icons and App Custom Styles
import '../css/icons.css';
import '../css/app.scss';

// Import Routes
import routes from './routes.js';

// Import main app component
import App from '../app.f7.html';

var app = new Framework7({
  root: '#app', // App root element
  component: App, // App main component

  name: 'Equipment', // App name
  theme: 'aurora', // Automatic theme detection
  view:{
    pushState:true,
  },
  methods:{
    auth:function(calback){
      var log = JSON.parse(localStorage.getItem("f7form-user"));
      if (log!=null){
      var mail = log.mail; var token=log.token;
      app.request.post('http://bbnura.tedeco.kz/api/vhod.php',{log:"",pass:"",token:token},function(data){
      if (data[0].message=="ok"){
        app.data.user.id=data[0].id;
        app.data.user.token=data[0].toekn;
        app.data.user.name=data[0].name;
      calback(true);
      }else {
      app.form.removeFormData("user");
      calback(false);
      }
      },'json');
    }
    else
    return calback(false);
    },
      },
  data:{
    user:{
      id:"",
      name:"",
      token:""
    },
  url:"http://bbnura.tedeco.kz"
    
  },


  // App routes
  routes: routes,
  // Register service worker
  serviceWorker: {
    path: '/service-worker.js',
  },
});