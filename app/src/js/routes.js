
import HomePage from '../pages/home.f7.html';
import Author from '../pages/author.f7.html';
import NotFoundPage from '../pages/404.f7.html';
import Scaner from '../pages/scaner.f7.html';
import History from '../pages/history.f7.html';
import Zayavka from '../pages/zayavka.f7.html';
import Notifi from '../pages/notifi.f7.html';
import Moi from '../pages/moi.f7.html';
import Otvet from '../pages/otvet.f7.html';
import Monitoring from '../pages/monitoring.f7.html';
import Vodo from '../pages/vodo.f7.html';
import Vodo_his from '../pages/vodo_his1.f7.html';
import Sklad from '../pages/sklad.f7.html';
var routes = [
  {
    path: '/',
    component: HomePage,
  },
  {
    path: '/author/',
    component: Author,
  },
  {
    path: '/scaner/',
    component: Scaner,
  },
  {
    path: '/history/',
    component: History,
  },
  {
    path: '/zayavka/',
    component: Zayavka,
  },
  {
    path: '/notifi/',
    component: Notifi,
  },
  {
    path: '/moi/',
    component: Moi,
  },
  {
    path: '/otvet/',
    component: Otvet,
  },
  {
    path: '/monitoring/',
    component: Monitoring,
  },
  {
    path: '/vodo/',
    component: Vodo,
  },
  {
    path: '/vodo_his/',
    component: Vodo_his,
  },
  {
    path: '/sklad/',
    component: Sklad,
  },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];

export default routes;