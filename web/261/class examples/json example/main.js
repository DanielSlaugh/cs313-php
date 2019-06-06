
const myList = fetch('data.json');

setTimeout(() => {
   console.log('delay');
}, 1000);

myListPromise.then((response) => {
   if (response.ok) {
      console.log('in then', response);
      return response.json();
   } else {
      throw new Error('not ok');
   }
})
.then(data => {
   console.log(data);
})
.catch((err) =>{
   console.log(err);
});

console.log(myList);