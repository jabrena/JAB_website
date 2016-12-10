/*
Validator Patterns.
Author : JAB, 2003
InfoContact : bren@juanantonio.info

+ isNumeric = cadena que de principio a fin solo contenga valores numericos.
+ isAlphanumeric = cadena que de principio a fin contenga valores
alfanumericos.
+ isSpanish = cadena que de principio a fin contenga valores alfanumericos
con acentos y caracteres especiales.
*/
ValidatorClass.isNumeric = /^\d+$/;
ValidatorClass.isAlphanumeric = /^\w+$/;
ValidatorClass.isAlphanumericWithSpaces = /^[\w\s]+$/;
ValidatorClass.isSpanish = /^(\w|[�����]|[@#�~EUR])+$/;
ValidatorClass.isSpanishWithSpaces = /^(\w|[�����]|\s)+$/;
ValidatorClass.acentos = "[�����]";
ValidatorClass.especiales = "[@#�~EUR]";
