## Компиляция приложения
Для начала создадим каталог приложения. В моем случае это будут папка по пути C:/typescript. В каталог добавим файл index.html. Откроем этот файл в любом текстовом редакторе и определим в нем следующий код:

```
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Metanit.com</title>
</head>
<body>
    <h2 id="header"></h2>
    <script src="app.js"></script>
</body>
</html>
```

Это обычный файл html, в котором определен пустой заголовок - элемент `<h2>` - в него мы будем выводить некоторое содержимое. И также на веб-странице подключается файл app.js.

Теперь в том же каталоге создадим файл app.ts. Причем именно app.ts, а не app.js, то есть файл кода typescrypt. Это также обычный текстовый файл, который имеет расширение .ts. И в app.ts определим следующее содержание:

```
class User{
    name : string;
    constructor(_name:string){
          
        this.name = _name;
    }
}
const tom : User = new User("Том");
const header = this.document.getElementById("header");
header.innerHTML = "Привет " + tom.name;
```

Что здесь происходит? Сначала определяет класс User - шаблон данных, которые будут использоваться на веб-странице. Этот класс имеет поле name, которое представляет тип string, то есть строку. Для передачи данных этому полю определен специальный метод - constructor, который принимает через параметр _name некоторую строку и передает ее в поле name:

```
class User{
    name : string;
    constructor(_name:string){
        this.name = _name;
    }
}
```

Далее мы подробнее разберем создание и использование классов. Далее создаем константу tom, которая представляет этот класс:

```
const tom : User = new User("Том");
```

Иначе говоря, константа tom представляет некоторого пользователя, у которого имя "Том".

Затем получаем элемент с id header на веб-странице в одноименную константу header:

```
const header = this.document.getElementById("header");
```

То есть этот элемент будет представлять определенный на веб-странице index.html заголовок `<h2>`.

Далее с помощью свойства innerHTML меняем содержимое элемента:

```
header.innerHTML = "Привет " + tom.name;
```

В данном случае свойству innerHTML передается строку, к которой добавляется значение свойства tom.name. То есть мы ожидаем, что в заголовок на веб-странице будет выводится создаваемая здесь строка.

Сохраним и скомпилируем этот файл. Для этого в командной строке/терминале с помощью команды cd перейдем к каталогу, где расположен файл app.ts (в моем случае это C:\typescript). И для компиляции выполним следующую команду:

```
tsc app.ts
```

![Alt text](/TypeScript/resources/%D0%9A%D0%BE%D0%BC%D0%B0%D0%BD%D0%B4%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%BE%D0%BA%D0%B0.png)

После компиляции в каталоге проекта создается файл app.js, который будет выглядеть так:

```
var User = /** @class */ (function () {
    function User(_name) {
        this.name = _name;
    }
    return User;
}());
var tom = new User("Том");
var header = this.document.getElementById("header");
header.innerHTML = "Привет " + tom.name;
```

![Alt text](/TypeScript/resources/%D0%9F%D0%B0%D0%BF%D0%BA%D0%B0_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B0.png)

И теперь мы можем кинуть веб-страницу index.html в браузер и увидеть результат работы написанного на TypeScript кода:

![Alt text](/TypeScript/resources/%D0%91%D1%80%D0%B0%D1%83%D0%B7%D0%B5%D1%80.png)