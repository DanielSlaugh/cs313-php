export default class hikeView {
   constructor() {

   }

   renderHikeLight(hike, path) {
      const item = document.createElement('li');

      item.innerHTML = ` <h2>${hike.name}</h2>
        <div class="container">
            <div class="image">
                <img src="${path}${hike.imgSrc}" alt="${hike.imgAlt}">
            </div>
            <div>
                <div>
                    <h3>Distance</h3>
                    <p>${hike.distance}</p>
                </div>
                <div>
                    <h3>Difficulty</h3>
                    <p>${hike.difficulty}</p>
                </div>
            </div>
        </div>`;

      return item;
   }
}