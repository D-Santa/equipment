
import HomePage from '../pages/home.f7.html';
import Registration from '../pages/registration.f7.html';
import Registration_u1 from '../pages/registration_u1.f7.html';
import Found from '../pages/found.f7.html';
import Auth from '../pages/auth.f7.html';
var routes = [
  {
    path: '/',
    component: Auth,
    options: {
      transition: 'f7-circle'
    },
  },
  {
    path: '/home/',
    component: HomePage,
    options: {
      transition: 'f7-circle'
    },
  },
  {
    path: '/registration/',
    component: Registration,
    options: {
      transition: 'f7-circle'
    },
  },
  {
    path: '/registration_u1/',
    component: Registration_u1,
    options: {
      transition: 'f7-circle'
    },
  },
  {
    path: '/found/',
    component: Found,
    options: {
      transition: 'f7-circle'
    },
  },
];

export default routes;