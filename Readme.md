Тестовое задание для команды
2ГИС.Товары

```
В 2ГИС владельцы фирм могут загружать информацию о своих товарах из файлов с
прайс листами. Каждый новый загружаемый пользователем файл содержит в себе
последнее актуальное состояние всех своих товаров.
Задача
Нужно сделать компонент на Go/PHP который будет получать на вход 2 два прайс
листа (старый и новый) в формате csv, и возвращать информацию о том:
● какие новые товары появились
● какие товары были обновлены
● какие товары пропали

Формат файла прайс листа
● это csv файл в текстовом виде
● в каждом файле есть заголовок колонок (Название;Описание;Цена)
● в роли разделителя используется символ точки с запятой “;”

Пример содержимого файла
Название;Описание;Цена
Телефон Apple Iphone 15;Новинка;144999
Телефон Apple Iphone 10xs;Старинка;44999
Результат
● оформить в виде репозитория на github, отправить ссылку на репозиторий
● должен содержать в себе код решения
● должен содержать в себе рабочий пример запуска на тестовых данных
```
___
Для запуска тестов: 

установить зависимости: composer install
запустить тесты: make run-tests
___
Для установки в проект:

composer require maksmaggot/pricelist-compare

Пример использования:

```
<?php

require __DIR__ . '/vendor/autoload.php';

$reader = new \Comparator\Reader\CsvPriceListReader();
$firstPriceList = $reader->read(__DIR__ . '/tests/testdata/pricelist.csv');
$secondPriceList = $reader->read(__DIR__ . '/tests/testdata/pricelist2.csv');

$comparator = new \Comparator\PriceListsComparator();
$result = $comparator->compare($firstPriceList, $secondPriceList);
```