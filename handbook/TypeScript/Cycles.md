В цикле for нужно указывать тип счетчика:

for (let i: number = 0; i <= 10; i++) {
	console.log(i);
}
А вот в цикле for-of тип переменной для элемента не указывается:

let arr: number[] = [1, 2, 3, 4, 5];

for (let elem of arr) {
	console.log(elem);
}
То же касается и цикла for-in - тип переменной для ключа не указывается:

let obj = {a: 1, b: 2, c: 3};

for (let key in obj) {
	console.log(key);
}