> Кортеж - массив, каждый элемент которого имеет свой жестко заданный тип.

Пример:

    let user: [string, number];

Заполнение при объявлении:

    let user: [string, number] = ['john', 31];

Вывод элементов:

    console.log(user[0]); // 'john'
    console.log(user[1]); // 31

Изменение кортежа:

    user[0] = 'eric';
    console.log(user);

Кортеж для чтения (перед типом указывается ключевое слово *readonly*):

    let user: readonly [string, number] = ['john', 31];

Попытка изменить такой кортеж приведет к ошибке.

Необязательный элемент обозначается "?"

    let user: [string, number, boolean?];

Деструктуризация

    let [name, age] = user; //разбиение частей в переменные


