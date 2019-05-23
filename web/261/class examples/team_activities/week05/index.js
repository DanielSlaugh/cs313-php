import hikeController from './controller.js';

window.addEventListener('load', () => {
   const controller = new hikeController('hikes');
   controller.renderHikeList();
});