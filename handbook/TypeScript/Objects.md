Кроме простых типов данных, как и в javascript, можно создавать сложные комплексные объекты, которые состоят из других объектов и примитивных данных. Например:

    let person = {name:"Tom", age:23};
    console.log(person.name);
    // альтернативный вариант получения свойства
    console.log(person["name"]);

Но несмотря на то, что это фактически тот же самый объект, что мы могли бы использовать в JavaScript, в силу строготипизированности TS мы имеем в данном случае ограничения. В частности, если у нас будет следующий код:

    let person = { name: "Tom", age: 23 };
    person = { name: "Bob" };           // ! Ошибка

То на второй строке мы получим ошибку, поскольку компилятор после первой строки предполагает, что объект person будет иметь два свойства name и age, которые имеют тип string и number соответственно. То есть в данном случае переменная person представляет тип { name: string; age: number }. И мы могли написать так:

    let person: { name: string; age: number } = { name: "Tom", age: 23 };
    console.log(person.name);

Поэтому данной переменной мы можем присвоить другой объект, который соответствует типу { name: string; age: number } по названиям, количеству и типу свойств, как в следующем случае

    let person = { name: "Tom", age: 23 };
    person = { name: "Bob", age: 35 };      // Норм

## Необязательные свойства

TypeScript позволяет сделать свойства необязательными. Для этого после названия свойства указывается знак вопроса ?

1
let person: { name: string; age?: number }; // Свойство age - необязательное
В данном случае свойство age является необязательным, поэтому мы можем не предоставлять для него значение:

    let person: { name: string; age?: number }; // Свойство age - необязательное
    
    person = { name: "Tom", age: 23 };
    console.log(person.name);   // Tom
    person = { name: "Bob"};    // Норм, свойство age - необязательное
    console.log(person.name);   // Bob

При обращении к неустановленному свойству мы получим undefined:

    let person: { name: string; age?: number } = { name: "Tom", age: 23 };
    
    console.log(person.age);    // 23
    person = { name: "Bob"};
    console.log(person.age);    // undefined

Поэтому при операциях с таким свойством мы можем проверять его на значение undefined:

    let person: { name: string; age?: number } = { name: "Tom", age: 36};
    if (person.age !== undefined) {
        
        console.log(person.age);
    }

## Объекты в функциях

Функция может принимать объекты в качестве параметров и могут возвращать объект. В этих случаях необходимо указать тип объекта для параметров и результата функции. Например, объект как параметр функции:

    function printUser(user: { name: string; age: number}) {
      console.log(`name: ${user.name}  age: ${user.age}`);
    }
    let tom = {age: 36, name: "Tom"};
    
    printUser(tom);

В данном случае параметр функции printUser представляет тип { name: string; age: number} - то есть объект, который имеет два свойства типов string и number.

При этом объект, передаваемый в качестве параметра, может быть более широким - содержать больше свойств, но главное, чтобы он содержал те свойства, которые предусмотрены для параметра функции:

    function printUser(user: { name: string; age: number}) {
      console.log(`name: ${user.name}  age: ${user.age}`);
    }
    let bob = {name: "Bob", age: 44, isMarried: true};
    printUser(bob);

Здесь переменная bob представляет тип {name: string, age: number, isMarried: boolean}, тем не менее он также соответствует определению типа { name: string; age: number}.

Объект как результат функции:

    function defaultUser(): { name: string; age: number} {
      
      return {name: "Tom", age: 37};
    }
    
    let user = defaultUser();
    console.log(`name: ${user.name}  age: ${user.age}`);

## Оператор in

Оператор in позволяет проверить наличие определенного свойства в объекта. Он возвращает true, если свойство есть в объекте, и false, если свойство отсутствует. Например:

    let tom: { name: string; age?: number } = { name: "Tom", age: 23 };
    let bob: { name: string; age?: number } = { name: "Bob"};
    
    function printUser(user: { name: string; age?: number }){
    
        if("age" in user){
            console.log(`Name: ${user.name} Age: ${user.age}`);
        }
        else{
            console.log(`Name: ${user.name}`);
        }
    }
    printUser(tom);
    printUser(bob);

Здесь функция printUser() принимает объект типа { name: string; age?: number }, то есть свойство age в таком объкте может присутствовать, а может отсутствовать. Поэтому применяем оператор in для проверки наличия свойства:

    if("age" in user){

Название свойства передается как строка.

Декомпозиция объектов-параметров
Если функция принимает объект в качестве параметра, то TypeScript позволяет автоматически разложить его на свойства:

    function printUser({name, age}: { name: string; age: number}) {
      console.log(`name: ${name}  age: ${age}`);
    }
    
    let tom = {name: "Tom", age: 36};
    printUser(tom);

Здесь функция `printUser()` в качестве параметра принимает объект из двух свойств. Запись {name, age} указывает, что свойства объекта автоматически будут разложены на два параметра: name и age. Главное, чтобы названия этих параметров соответствовали названиям свойств объекта.

Некоторые параметры могут необязательными:

    function printUser({name, age}: { name: string; age?: number}) {
      if(age!==undefined){ console.log(`name: ${name}  age: ${age}`);}
      else {console.log(`name: ${name}`);}
    }
    let tom = {name: "Tom"};
    printUser(tom);     // name: Tom
    
    let bob = {name: "Bob", age: 44};
    printUser(bob);     // name: Bob  age: 44

В данном случае параметр age является необязательным. Кроме того, имеет значение по умолчанию. Поэтому функция может принимать объект без свойства age.

Также они могут принимать значения по умолчанию:

    function printUser({name, age = 25}: { name: string; age?: number}) {
      console.log(`name: ${name}  age: ${age}`);
    }
    
    let tom = {name: "Tom"};
    printUser(tom);     // name: Tom  age: 25
    
    let bob = {name: "Bob", age: 44};
    printUser(bob);     // name: Bob  age: 44