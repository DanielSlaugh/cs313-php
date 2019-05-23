import hikeModel from './model.js';
import hikeView from './view.js';

export default class hikeController {
   constructor(elementId) {
      this.element = document.getElementById(elementId);
      this.model = new hikeModel();
      this.view = new hikeView();
   }

   renderHikeList() {
      this.element.innerHTML = '';
      const list = this.model.getList();
      const path = this.model.getPath();
      list.forEach(hike => {
         this.element.appendChild(this.view.renderHikeLight(hike, path));
      });
   }

}