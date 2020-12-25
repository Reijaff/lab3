function printArr(arr) {
let str = "";
  for (let item of arr) {
    if (Array.isArray(item)) str += printArr(item);
    else str += item + ", ";
  }
  str += '\n';
  return str;
}

func_v7 = function(){
	let arr = new Array(10);
	let table = "";	
	for ( var i =5;i<16;i++){
		arr[i-5] = new Array(3);
		arr[i-5][0] = i;
		arr[i-5][1] = i * i;
		arr[i-5][2] = i * i * i;
		
	}
	alert(printArr(arr));

	

}

func_v7()
