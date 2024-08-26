## Ссылки
- https://metanit.com/web/typescript/2.3.php (metanit) 

<br>

Для определения функций в TS можно использовать **стрелочные функции** или **arrow functions**. 

*Стрелочные функции* представляют выражения типа (параметры) => тело функции. 

Например:

    let sum = (x: number, y: number) => x + y;
    
    let result = sum(15, 35); // 50
    console.log(result);

Тип параметров можно опускать:

    let sum = (x, y) => x + y;
    
    let result = sum(15, 35); // 50
    console.log(result);

Если стрелочная функция не требует параметров, то используются пустые `( )`. Если передается только 1 параметр, то скобки можно опустить:

    let square = x => x * x;
    let hello = () => "hello world"
    
    console.log(square(5)); // 25
    console.log(hello());   // hello world

Если тело функции представляет множество выражений, а не просто одно выражение, как в примере выше, тогда можно опять же заключить все выражения в `{ }`:

    let sum = (x: number, y: number) => {
        x *= 2;
        return x + y;
    };
    
    let result = sum(15, 35); // 65
    console.log(result);

Стрелочные функции можно передавать в функцию вместо параметра, который представляет собой функцию:

    function mathOp(x: number, y: number, operation: (a: number, b: number) => number): number{
    
        let result = operation(x, y);
        return result;
    }
    console.log(mathOp(10, 20, (x,y)=>x+y)); // 30 
    console.log(mathOp(10, 20, (x, y) => x * y)); // 200 