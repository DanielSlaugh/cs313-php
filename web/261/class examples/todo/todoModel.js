export default class todoModel{
constructor (key) {
   this.key = key;
}

add(data){
   // call local storage and if we get something, set it.
   //If we don't, set it to an empty array so that it's never equal to 'null'
   const newToDo = {
      id: new Date(),
      content: data,
      completed: false
   };
   this.toDos.push(newToDo);
   this.toDos = readLS(this.key) || [];
}

delete(id){

}

getItems(){

}

getFilterItems(){

}

getFilteredItems(query){

}

complete(id){

}

}

// make these outside of the class in order to prevent hacking and users breaking our code
function readLS(key){
   // Turn string into an object so it can be used by html
   return JSON.parse(window.localStorage.getItem(key));
}

// need key parameter so we're saving it in the right place
function writeLS(key, toDos){
   // turn object into a flat string so it can be used in database & writes it
   windows.localStorage.setItem(key, JSON.stringify(toDos));
}
