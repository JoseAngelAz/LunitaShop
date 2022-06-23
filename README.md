 video 23, últimos productos en pagina home.TERMINADO Modulo ultimos productos en Home.
minuto 32.TERMINADO CATEGORIAS EN HOME.
24. Carrusel dinamico funcionando en home y detalle de producto.
voy para video 26, no he comenzado nada, hay que hacerlo!.Terminado
voy para le video 27.

 Querys usandos:
 PARA CATEGORIAS
 INSERT INTO home_categories(
     id,sel_categories,no_of_products,created_at,updated_at
 )VALUES(
     NULL,'1,2,3','8','2022-06-01',NULL
 );

 INSERT INTO home_categories(
     sel_categories,no_of_products,
 )VALUES(
     '1,2,3',8,
 );

 PARA TIEMPOS DE VENTA:
 INSERT INTO sales(
     id,sale_date,status,created_at,updated_at
 )VALUES(
     NULL,'2022-6-3 03:09:18','1',NULL,NULL
 );