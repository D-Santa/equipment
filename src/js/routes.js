import HomePage from '../pages/auth.f7.html';
import Glav from '../pages/glav.f7.html';
import Types from '../pages/types.f7.html';
import Add from '../pages/add.f7.html';
import Edit from '../pages/edit.f7.html';
import Company from '../pages/company.f7.html';
import Users from '../pages/users.f7.html';
import Zayavki from '../pages/zayavki.f7.html';
import Sot from '../pages/sotrudnik.f7.html';
import Sklad from '../pages/sklad.f7.html';
import Sklady from '../pages/sklady.f7.html';
import Tovar from '../pages/tovar.f7.html';
import Vputi from '../pages/vputi.f7.html';
import Pere from '../pages/pere.f7.html';
import Place from '../pages/place.f7.html';
import Sobyt from '../pages/sobytie.f7.html';
import Post from '../pages/post.f7.html';
import History from '../pages/history.f7.html';
import NotFoundPage from '../pages/404.f7.html';
var routes = [
  {
    path: '/',
    component: HomePage,
  },
  {
    path: '/glav/',
    component: Glav,
  },
  {
    path: '/types/',
    component: Types,
  },
  {
    path: '/add/',
    component: Add,
  },
  {
    path: '/edit/',
    component: Edit,
  },
  {
    path: '/company/',
    component: Company,
  },
  {
    path: '/users/',
    component: Users,
  },
  {
    path: '/zayavki/',
    component: Zayavki,
  },
  {
    path: '/sot/',
    component: Sot,
  },
  {
    path: '/sklad/',
    component: Sklad,
  },
  {
    path: '/sklady/',
    component: Sklady,
  },
  {
    path: '/tovar/',
    component: Tovar,
  },
  {
    path: '/vputi/',
    component: Vputi,
  },
  {
    path: '/pere/',
    component: Pere,
  },
  {
    path: '/place/',
    component: Place,
  },
  {
    path: '/sobyt/',
    component: Sobyt,
  },
  {
    path: '/post/',
    component: Post,
  },
  {
    path: '/history/',
    component: History,
  },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];

export default routes;