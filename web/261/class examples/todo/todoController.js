import todoModel from './todoModel.js';
export default class todoController{
   constructor(elementID){
      // we need to instantiate a new model and give it a key
      this.model = new todoModel('todo');
      this.element = document.getElementById(elementID);
   }

   addTodo(){
      this.model.add('Finish class');
   }

}
