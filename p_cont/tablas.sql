#----------------------------------------------------------------
DROP TABLE IF EXISTS inf_contable;
create table inf_contable(
        id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
        tipo1 varchar(6),
        sociedad varchar(10),
        proveedor varchar(15),
        tipo2 varchar(2),
        fecha date,
        fecha_sistema date,
        tipo3 varchar(6),
        importe double(14,2),
        PRIMARY KEY (id)
);
#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS sociedades;
create table sociedades(
        id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
        sociedad varchar(20),
        PRIMARY KEY (id)
);
#----------------------------------------------------------------


#----------------------------------------------------------------
DROP TABLE IF EXISTS sociedades_sucursales;
create table sociedades_sucursales(
        id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
        id_sociedad mediumint,
        id_sucursal mediumint,
        PRIMARY KEY (id)
);
#----------------------------------------------------------------




