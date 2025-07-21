// estructura general de datos
// cuando un elemento no existe es que no se aplica
// implica que tienes que comprobar si un elemento existe antes de preguntar su valor

const estructura_generica = {
    entity: 'nombredeentidad', // nombre de la entidad (obligatorio)
    attributes: { // conjunto de descripciones de atributos de la entidad (obligatorio)
        nombredeatributo :{ //nombre del atributo(obligatorio)
            pk: true, // indica si es clave primaria. No obligatorio, solo si es clave primaria
            autoincrement: true, // indica si es autoincremental. No obligatorio, solo si es autoincremetal
            type: 'tipo', // tipo de dato del atributo (string, number, date, boolean, file, etc).(obligatorio)
            unique: true, // indica si es unico. No obligatorio, solo si es unico
            not_null:{// indica si el atributo no puede ser nulo. No obligatorio, solo si no puede ser nulo
                ADD: true, // indica si no puede ser nulo en la accion ADD. No obligatorio
                EDIT: true, // indica si no puede ser nulo  en la accion EDIT. No obligatorio
                SEARCH: true, // indica si no puede ser nulo  en la accion SEARCH. No obligatorio
                DELETE: true // indica ssi no puede ser nulo  en la accion DELETE. No obligatorio                
            },
            default_value: 'valorpordefecto', // indica si hay un valor por defecto que colocar en el campo si esta vacio. No obligatorio, solo si se desea un valor por defecto (en la accion ADD)
            rules:{ // reglas de validacion (obligatorio)
                validations: { // conjunto de validaciones que se aplican al atributo (obligatorio)
                    nombreaccion:{ // indicación de la accion. No obligatorio si para el campo no hay validacion.(ADD, EDIT,SEARCH)
                        min_size: [8], // funcion atomica tamaño minimo, tiene el parametro de tamaño minimo del atributo (el que sea). No obligatorio sino se comprueba el tamaño minimo
                        max_size: [68], // funcion atomica tamaño maximo, tiene el parametro de tamaño maximo del atributo (el que sea). No obligatorio sino se comprueba el tamaño maximo
                        exp_reg: ["expresionregular"], // funcion atomica para comprobar el formato del atributo, tiene el parametro de expresión regular del valor del atributo (el que sea). No obligatorio sino se comprueba el formato
                        personalized: "personalized_validation_nombreatributo($extravalues)", // funcion personalizada. corresponde con un metodo en la clase entidad correspondiente, para ejecutarla deben existir las variables parametro de la funcion (id, valor, extravalues). No obligatorio sino hay funciones de validacioin personalizadas
                    } 
                }         
            }
        }, // fin de este atributo y se rellena para los siguientes
    },
    associations: { // conjunto de asociaciones con otras entidades (opcional)
        nombredeasociacion: { // nombre de la asociacion(one-to-one, one-to-many, many-to-many). (obligatorio)
            entity: 'nombredeentidad', // nombre de la entidad asociada (obligatorio)
            attributesPropios: ['nombredeatributo'], // nombre del atributo de esta entidad relacionado con la entidad asociada (obligatorio)
            attributesRelacionados: ['id_atributo1', 'id_atributo2'], // nombre del atributo de la entidad asociada relacionado con esta entidad (obligatorio)
        }
    }
};

const estructura_usuario = {
    entity: 'usuario',
    attributes: {
        id_usuario: {
            pk: true,
            autoincrement: true,
            type: 'integer',
            not_null: {
                EDIT: true,
                DELETE: true
            },
            rules: {
                validations: {
                    ADD: {
                        max_size: 10,
                        exp_reg: /.*/
                    },
                    EDIT: {
                        max_size: 10,
                        exp_reg: /.*/
                    },
                    SEARCH: {
                        max_size: 10,
                        exp_reg: /.*/
                    }
                }
            }
        },
        nombre_usuario: {
            type: 'string',
            unique: true,
            not_null: {
                ADD: true,
                EDIT: true
            },
            rules: {
                validations: {
                    ADD: {
                        min_size: 3,
                        max_size: 25,
                        exp_reg: /^[a-zA-Z][a-zA-Z0-9_-]+$/,
                        personalized: 'validarDesdeParametro($atributo)'
                    },
                    EDIT: {
                        min_size: 3,
                        max_size: 25,
                        exp_reg: /^[a-zA-Z][a-zA-Z0-9_-]+$/
                    },
                    SEARCH: {
                        max_size: 25,
                        exp_reg: /^([a-zA-Z][a-zA-Z0-9_-]+)?$/
                    }
                }
            }
        },
        organizacion_usuario: {
            type: 'string',
            not_null: {
                ADD: true,
                EDIT: true
            },
            rules: {
                validations: {
                    ADD: {
                        min_size: 3,
                        max_size: 45,
                        exp_reg: /^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/
                    },
                    EDIT: {
                        min_size: 3,
                        max_size: 45,
                        exp_reg: /^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/
                    },
                    SEARCH: {
                        max_size: 45,
                        exp_reg: /^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/
                    }
                }
            }
        },
        puesto_usuario: {
            type: 'string',
            not_null: {
                ADD: true,
                EDIT: true
            },
            default_value: 'alumno',
            rules: {
                validations: {
                    ADD: {
                        min_size: 6,
                        max_size: 45,
                        exp_reg: /^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/
                    },
                    EDIT: {
                        min_size: 6,
                        max_size: 45,
                        exp_reg: /^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/
                    },
                    SEARCH: {
                        max_size: 45,
                        exp_reg: /^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/
                    }
                }
            }
        },
        direccion_usuario: {
            type: 'string',
            not_null: {
                ADD: true,
                EDIT: true
            },
            rules: {
                validations: {
                    ADD: {
                        min_size: 10,
                        max_size: 200,
                        exp_reg: /^[a-zA-Záéíóú0-9\s,\-\.#'()º]+$/
                    },
                    EDIT: {
                        min_size: 10,
                        max_size: 200,
                        exp_reg: /^[a-zA-Záéíóú0-9\s,\-\.#'()º]+$/
                    },
                    SEARCH: {
                        max_size: 200,
                        exp_reg: /^[a-zA-Záéíóú0-9\s,\-\.#'()º]*$/
                    }
                }
            }
        },
        correo_usuario: {
            type: 'string',
            unique: true,
            not_null: {
                ADD: true,
                EDIT: true
            },
            rules: {
                validations: {
                    ADD: {
                        min_size: 6,
                        max_size: 45,
                        exp_reg: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                        personalized: 'personalized_correo_usuario()'
                    },
                    EDIT: {
                        min_size: 6,
                        max_size: 45,
                        exp_reg: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
                    },
                    SEARCH: {
                        max_size: 45,
                        exp_reg: /^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})?$/
                    }
                }
            }
        }
    }
};

/*

CREATE TABLE `persona` (
  `dni` varchar(9) COLLATE utf8_bin NOT NULL,
  `nombre_persona` varchar(45) COLLATE utf8_bin NOT NULL,
  `apellidos_persona` varchar(100) COLLATE utf8_bin NOT NULL,
  `fechaNacimiento_persona` date NOT NULL,
  `direccion_persona` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefono_persona` varchar(9) COLLATE utf8_bin NOT NULL,
  `email_persona` varchar(45) COLLATE utf8_bin NOT NULL,
  `foto_persona` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

Primary Key de la entidad persona: dni
Uniques en la entidad persona: email_persona

dni: formato dni válido de 8 números y una letra
nombre_persona: alfabético con acentos, guión y espacios de max 45 min 3
apellidos_persona: alfabético con acentos, guión y espacios de max 100 min 5
fechaNacimiento_persona: fecha válida de 2 números para día, dos números para mes y cuatro números para año, / como caracter de separación
dirección_persona: alfabético con acentos, números, espacios, ‘/’,’-’,’,’,’º’,‘ª’, max 200 min 10
telefono_persona: número de teléfono válido formato de España max 9
email_persona: email válido max 45 min 8
foto_persona; alfabético sin acentos con extensión jpg o png max 40 (esto es debido a que se necesitan caracteres para almacenar su ruta en bd) min 6


*/