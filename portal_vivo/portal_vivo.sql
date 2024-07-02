-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Mar-2019 às 22:37
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_vivo`
--
CREATE DATABASE IF NOT EXISTS `portal_vivo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `portal_vivo`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `add_contestacoes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_contestacoes` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS add_parceiro;	

CREATE TEMPORARY TABLE IF NOT EXISTS add_parceiro AS(

SELECT
id,
protocolo,
pedido,
cnpj_cpf,
descricao_defesa,
`status`,
id_parceiro,
email,
endereco_anexo,
endereco_download,
revisao,
created_at,
data_criacao,
reaberto
FROM portal_vivo.parceiros 

WHERE id=idb 

ORDER BY id DESC
);

INSERT INTO portal_vivo.contestacoes(id_parc,
                                     protocolo,
                                     pedido,
                                     cnpj_cpf,
                                     descricao_defesa,
                                     `status`,
                                     id_parceiro,
                                     email,
                                     endereco_anexo,
                                     endereco_download,
                                     revisao,
                                     created_at,
                                     reaberto,
                                     data_criacao)
                                     (SELECT
                                      id,
                                      protocolo,
                                      pedido,
                                      cnpj_cpf,
                                      descricao_defesa,
                                      `status`,
                                      id_parceiro,
                                      email,
                                      endereco_anexo,
                                      endereco_download,
                                      revisao,
                                      created_at,
                                      reaberto, 
                                      data_criacao
                                      FROM add_parceiro);
END$$

DROP PROCEDURE IF EXISTS `add_revisao`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_revisao` (IN `pedidob` VARCHAR(255))  BEGIN
DROP TABLE IF EXISTS form_revisao;	

CREATE TEMPORARY TABLE IF NOT EXISTS form_revisao AS(

SELECT
a.id,
a.pedido,
a.revisao, 
CASE 
WHEN a.revisao IS NULL THEN 1 
WHEN a.revisao IS NOT NULL THEN a.revisao+1 
END as revisao2
 
FROM portal_vivo.parceiros a
WHERE a.pedido=pedidob 
GROUP BY a.pedido,a.revisao DESC LIMIT 1

);

SELECT * FROM form_revisao;

UPDATE portal_vivo.parceiros a,(SELECT * FROM form_revisao)b
SET a.revisao=b.revisao2
WHERE a.pedido=pedidob AND a.revisao IS NULL;

SET @id:=(SELECT id FROM form_revisao);

CALL add_contestacoes(@id);

END$$

DROP PROCEDURE IF EXISTS `add_revisao_reaberto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_revisao_reaberto` (IN `pedidob` VARCHAR(255))  BEGIN
DROP TABLE IF EXISTS form_revisao;	

CREATE TEMPORARY TABLE IF NOT EXISTS form_revisao AS(

SELECT
a.id,
a.pedido,
a.revisao, 
a.reaberto,
CASE 
WHEN a.revisao IS NULL THEN 1 
WHEN a.revisao IS NOT NULL THEN a.revisao+1 
END as revisao2

 
FROM portal_vivo.parceiros a
WHERE a.pedido=pedidob 
GROUP BY a.pedido,a.revisao DESC LIMIT 1

);

UPDATE portal_vivo.parceiros a,(SELECT * FROM form_revisao)b
SET a.revisao=b.revisao2
WHERE a.pedido=pedidob AND a.revisao IS NULL;

SET @id:=(SELECT id FROM portal_vivo.parceiros WHERE pedido=pedidob AND status='Reanálise');

CALL add_contestacoes(@id);

END$$

DROP PROCEDURE IF EXISTS `dashboard_portal`$$
CREATE DEFINER=``@`%` PROCEDURE `dashboard_portal` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal;

DROP TABLE
IF
	EXISTS dashboard_status;

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal (
	Total INT(255),
	Procedente INT (255),
	Improcedente INT (255),
  Em_analise INT (255),
  Reanalise INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status AS (
SELECT DISTINCT
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Procedente' AND SUBSTRING(data_tratamento,1,8)=SUBSTRING(NOW(),1,8)) as 'Procedente',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Improcedente' AND  SUBSTRING(data_tratamento,1,8)= SUBSTRING(NOW(),1,8)) as 'Improcedente',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Em Análise') as 'Em_analise',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Reanálise') as 'Reanalise'
FROM
	portal_vivo.contestacoes 

);

INSERT INTO dashboard_portal(	Procedente,
	                            Improcedente,
                              Em_analise,
                              Reanalise,
                              Total)(SELECT Procedente,
                                                 Improcedente,
                                                 Em_analise,
                                                 Reanalise,
                                                 (Procedente+Improcedente+Em_Analise+Reanalise) as Total
                                         FROM dashboard_status);


SELECT Procedente,Improcedente,Em_analise,Reanalise FROM dashboard_portal;

END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_concluido`$$
CREATE DEFINER=``@`%` PROCEDURE `dashboard_portal_concluido` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido;

DROP TABLE
IF
	EXISTS dashboard_status_concluido;

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_concluido (
	Total INT(255),
	Procedente INT (255),
	Improcedente INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_concluido AS (
SELECT DISTINCT
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Procedente' AND SUBSTRING(data_tratamento,1,8)=SUBSTRING(NOW(),1,8)) as 'Procedente',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Improcedente' AND  SUBSTRING(data_tratamento,1,8)= SUBSTRING(NOW(),1,8)) as 'Improcedente'
FROM
	portal_vivo.contestacoes 

);

INSERT INTO dashboard_portal_concluido(	Procedente,
	                            Improcedente,
                              Total)(SELECT Procedente,
                                                 Improcedente,
                                                 (Procedente+Improcedente) as Total
                                         FROM dashboard_status_concluido);


SELECT Procedente,Improcedente,Total FROM dashboard_portal_concluido;

END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_concluido2`$$
CREATE DEFINER=``@`%` PROCEDURE `dashboard_portal_concluido2` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido;

DROP TABLE
IF
	EXISTS dashboard_status_concluido;

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_concluido (
	Total INT(255),
	Procedente INT (255),
	Improcedente INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_concluido AS (
SELECT DISTINCT
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Procedente' AND SUBSTRING(updated_at,1,8)=SUBSTRING(NOW(),1,8)) as 'Procedente',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Improcedente' AND  SUBSTRING(updated_at,1,8)= SUBSTRING(NOW(),1,8)) as 'Improcedente'
FROM
	portal_vivo.contestacoes 

);

INSERT INTO dashboard_portal_concluido(	Procedente,
	                            Improcedente,
                              Total)(SELECT Procedente,
                                                 Improcedente,
                                                 (Procedente+Improcedente) as Total
                                         FROM dashboard_status);


SELECT Procedente,Improcedente,Total FROM dashboard_portal_concluido;

END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_concluido_3_mesesimproc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard_portal_concluido_3_mesesimproc` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido_3_meses;

DROP TABLE
IF
	EXISTS dashboard_status_concluido_3_meses_improc;


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_concluido_3_meses(
	`Status` VARCHAR(255),
	`Jan` INT (255),
	`Fev` INT (255),
	`Mar` INT (255),
	`Abr` INT (255),
	`Mai` INT (255),
	`Jun` INT (255),
	`Jul` INT (255),
	`Ago` INT (255),
	`Set` INT (255),
	`Out` INT (255),
	`Nov` INT (255),
	`Dez` INT (255)
	);

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_concluido_3_meses_improc AS (
SELECT DISTINCT
  SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 01 THEN 1 ELSE 0 END ) 'Jan',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 02 THEN 1 ELSE 0 END ) 'Fev',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 03 THEN 1 ELSE 0 END ) 'Mar',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 04 THEN 1 ELSE 0 END ) 'Abr',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 05 THEN 1 ELSE 0 END ) 'Mai',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 06 THEN 1 ELSE 0 END ) 'Jun',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 07 THEN 1 ELSE 0 END ) 'Jul',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 08 THEN 1 ELSE 0 END ) 'Ago',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 09 THEN 1 ELSE 0 END ) 'Set',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 10 THEN 1 ELSE 0 END ) 'Out',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 11 THEN 1 ELSE 0 END ) 'Nov',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 12 THEN 1 ELSE 0 END ) 'Dez' 
FROM
	portal_vivo.contestacoes 
WHERE `status`='Improcedente' 
AND SUBSTRING(data_tratamento,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()

);

INSERT INTO dashboard_portal_concluido_3_meses(
                                              `Status`,
	                                            `Jan`,
	                                            `Fev`,
	                                            `Mar`,
	                                            `Abr`,
	                                            `Mai`,
	                                            `Jun`,
	                                            `Jul`,
	                                            `Ago`,
	                                            `Set`,
	                                            `Out`,
	                                            `Nov`,
	                                            `Dez`)(SELECT  'Improcedente',
	                                                           `Jan`,
	                                                           `Fev`,
	                                                           `Mar`,
	                                                           `Abr`,
	                                                           `Mai`,
	                                                           `Jun`,
	                                                           `Jul`,
	                                                           `Ago`,
	                                                           `Set`,
	                                                           `Out`,
	                                                           `Nov`,
	                                                           `Dez`
                                         FROM dashboard_status_concluido_3_meses_improc);

SELECT * FROM dashboard_portal_concluido_3_meses;

END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_concluido_3_mesesproc`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard_portal_concluido_3_mesesproc` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido_3_meses;

DROP TABLE
IF
	EXISTS dashboard_status_concluido_3_meses_proc;


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_concluido_3_meses(
	`Status` VARCHAR(255),
	`Jan` INT (255),
	`Fev` INT (255),
	`Mar` INT (255),
	`Abr` INT (255),
	`Mai` INT (255),
	`Jun` INT (255),
	`Jul` INT (255),
	`Ago` INT (255),
	`Set` INT (255),
	`Out` INT (255),
	`Nov` INT (255),
	`Dez` INT (255)
	);

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_concluido_3_meses_proc AS (
SELECT DISTINCT
  SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 01 THEN 1 ELSE 0 END ) 'Jan',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 02 THEN 1 ELSE 0 END ) 'Fev',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 03 THEN 1 ELSE 0 END ) 'Mar',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 04 THEN 1 ELSE 0 END ) 'Abr',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 05 THEN 1 ELSE 0 END ) 'Mai',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 06 THEN 1 ELSE 0 END ) 'Jun',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 07 THEN 1 ELSE 0 END ) 'Jul',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 08 THEN 1 ELSE 0 END ) 'Ago',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 09 THEN 1 ELSE 0 END ) 'Set',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 10 THEN 1 ELSE 0 END ) 'Out',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 11 THEN 1 ELSE 0 END ) 'Nov',
	SUM( CASE DATE_FORMAT(data_tratamento, '%m' ) WHEN 12 THEN 1 ELSE 0 END ) 'Dez' 
FROM
	portal_vivo.contestacoes 
WHERE `status`='Procedente' 
AND SUBSTRING(data_tratamento,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()

);

INSERT INTO dashboard_portal_concluido_3_meses(
                                              `Status`,
	                                            `Jan`,
	                                            `Fev`,
	                                            `Mar`,
	                                            `Abr`,
	                                            `Mai`,
	                                            `Jun`,
	                                            `Jul`,
	                                            `Ago`,
	                                            `Set`,
	                                            `Out`,
	                                            `Nov`,
	                                            `Dez`)(SELECT  'Procedente',
	                                                           `Jan`,
	                                                           `Fev`,
	                                                           `Mar`,
	                                                           `Abr`,
	                                                           `Mai`,
	                                                           `Jun`,
	                                                           `Jul`,
	                                                           `Ago`,
	                                                           `Set`,
	                                                           `Out`,
	                                                           `Nov`,
	                                                           `Dez`
                                         FROM dashboard_status_concluido_3_meses_proc);

SELECT * FROM dashboard_portal_concluido_3_meses;

END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_sla`$$
CREATE DEFINER=``@`%` PROCEDURE `dashboard_portal_sla` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_sla;

DROP TABLE
IF
	EXISTS dashboard_status_sla;

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_sla (
	Total INT(255),
	Em_analise_Dentro INT (255),
  Em_analise_Fora INT (255),
  Reanalise_Dentro INT (255),
  Reanalise_Fora INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_sla AS (
SELECT DISTINCT
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Em Análise' AND sla='Dentro') as 'Em_analise_Dentro',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Em Análise' AND sla='Fora') as 'Em_analise_Fora',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Reanálise' AND sla='Dentro') as 'Reanalise_Dentro',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Reanálise' AND sla='Fora') as 'Reanalise_Fora'
FROM
	portal_vivo.contestacoes 

);

INSERT INTO dashboard_portal_sla(	
                              Em_analise_Dentro,
                              Em_analise_Fora,
                              Reanalise_Dentro,
                              Reanalise_Fora)(SELECT	Em_analise_Dentro,
                                                      Em_analise_Fora,
                                                      Reanalise_Dentro,
                                                      Reanalise_Fora
                                         FROM dashboard_status_sla);


SELECT * FROM dashboard_portal_sla;



END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_slabkp`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard_portal_slabkp` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_sla;

DROP TABLE
IF
	EXISTS dashboard_status_sla;

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_sla (
	Total INT(255),
	Procedente_Dentro INT (255),
  Procedente_Fora INT (255),
	Improcedente_Dentro INT (255),
  Improcedente_Fora INT (255),
  Em_analise_Dentro INT (255),
  Em_analise_Fora INT (255),
  Reanalise_Dentro INT (255),
  Reanalise_Fora INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_sla AS (
SELECT DISTINCT
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Procedente' AND SUBSTRING(updated_at,1,8)=SUBSTRING(NOW(),1,8) AND sla='Dentro') as 'Procedente_Dentro',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Procedente' AND SUBSTRING(updated_at,1,8)=SUBSTRING(NOW(),1,8) AND sla='Fora') as 'Procedente_Fora',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Improcedente' AND  SUBSTRING(updated_at,1,8)= SUBSTRING(NOW(),1,8) AND sla='Dentro' ) as 'Improcedente_Dentro',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Improcedente' AND  SUBSTRING(updated_at,1,8)= SUBSTRING(NOW(),1,8) AND sla='Fora' ) as 'Improcedente_Fora',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Em Análise' AND sla='Dentro') as 'Em_analise_Dentro',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Em Análise' AND sla='Fora') as 'Em_analise_Fora',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Reanálise' AND sla='Dentro') as 'Reanalise_Dentro',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Reanálise' AND sla='Fora') as 'Reanalise_Fora'
FROM
	portal_vivo.contestacoes 

);

INSERT INTO dashboard_portal_sla(	Procedente_Dentro,
                              Procedente_Fora,
	                            Improcedente_Dentro,
                              Improcedente_Fora,
                              Em_analise_Dentro,
                              Em_analise_Fora,
                              Reanalise_Dentro,
                              Reanalise_Fora)(SELECT	Procedente_Dentro,
                                                      Procedente_Fora,
	                                                    Improcedente_Dentro,
                                                      Improcedente_Fora,
                                                      Em_analise_Dentro,
                                                      Em_analise_Fora,
                                                      Reanalise_Dentro,
                                                      Reanalise_Fora
                                         FROM dashboard_status_sla);


SELECT * FROM dashboard_portal_sla;



END$$

DROP PROCEDURE IF EXISTS `dashboard_portal_slaqtd`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `dashboard_portal_slaqtd` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_sla1;

DROP TABLE
IF
	EXISTS dashboard_status_sla1;

CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_sla1 (
	Total INT(255),
	Em_analise INT (255),
  Reanalise INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_sla1 AS (
SELECT DISTINCT
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Em Análise') as 'Em_analise',
 (SELECT COUNT(status) FROM portal_vivo.contestacoes  WHERE status='Reanálise') as 'Reanalise'
FROM
	portal_vivo.contestacoes 

);

INSERT INTO dashboard_portal_sla1(	
                              Em_analise,
                              Reanalise)(SELECT	Em_analise,
                                                Reanalise
                                         FROM dashboard_status_sla1);


SELECT * FROM dashboard_portal_sla1;



END$$

DROP PROCEDURE IF EXISTS `exportar_base_criado_em`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `exportar_base_criado_em` (IN `datab` DATE, IN `datab1` DATE)  BEGIN
	
DROP TABLE IF EXISTS exp_analise;	

CREATE TEMPORARY TABLE IF NOT EXISTS exp_analise AS(
SELECT DISTINCT 
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao_defesa,
b.nome as nome_parceiro,
f.nome as operador_contestacao,
a.id,
a.revisao,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_hora,
d.motivo,
e.submotivo,
c.descricao as retorno_contestacao,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as data_tratativa
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
LEFT JOIN portal_vivo.contestacoes c ON c.id_parc=a.id
LEFT JOIN portal_vivo.motivos d  ON c.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON c.submotivos = e.id
LEFT JOIN portal_vivo.users f ON f.id = c.id_contestacao_op

WHERE DATE_FORMAT(a.data_criacao,'%Y-%m-%d') BETWEEN datab AND datab1 AND a.status IS NOT NULL

ORDER BY SUBSTRING(a.data_criacao,1,10),a.protocolo ASC

);



SELECT DISTINCT data_hora,
                protocolo,
                pedido,
                `status`,
                cnpj_cpf,
                descricao_defesa,
                nome_parceiro,
                operador_contestacao,
                motivo,
                submotivo,
                retorno_contestacao,
                data_tratativa 
FROM exp_analise 
ORDER BY protocolo ASC
;

END$$

DROP PROCEDURE IF EXISTS `exportar_base_dt_tratamento`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `exportar_base_dt_tratamento` (IN `datab` DATE, IN `datab1` DATE)  BEGIN
	
DROP TABLE IF EXISTS exp_analise3;	


CREATE TEMPORARY TABLE IF NOT EXISTS exp_analise3 AS(

SELECT DISTINCT 
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao_defesa,
b.nome as nome_parceiro,
f.nome as operador_contestacao,
a.id,
a.revisao,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_hora,
d.motivo,
e.submotivo,
c.descricao as retorno_contestacao,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratativa
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
LEFT JOIN portal_vivo.contestacoes c ON c.id_parc=a.id
LEFT JOIN portal_vivo.motivos d  ON c.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON c.submotivos = e.id
LEFT JOIN portal_vivo.users f ON f.id = c.id_contestacao_op

WHERE DATE_FORMAT(a.data_tratamento,'%Y-%m-%d') BETWEEN datab AND datab1 AND a.status IS NOT NULL

ORDER BY SUBSTRING(a.data_criacao,1,10),a.protocolo ASC

);



SELECT DISTINCT * FROM exp_analise3; 


END$$

DROP PROCEDURE IF EXISTS `exporta_geral`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `exporta_geral` (IN `datab` DATE, IN `datab1` DATE, IN `pesquisab` VARCHAR(3))  BEGIN

SET @pesquisab1:=pesquisab;
SET @dtb:=datab;
SET @dtb1:=datab1;
	
IF @pesquisab1 = 1 || @pesquisab1 = 4 THEN


CALL portal_vivo.exportar_base_criado_em(@dtb,@dtb1);


ELSEIF @pesquisab1 = 5 THEN


CALL portal_vivo.exportar_base_dt_tratamento(@dtb,@dtb1);


END IF;


END$$

DROP PROCEDURE IF EXISTS `fila_contestacao`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_contestacao` (IN `idb` INT, IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_contestacao;	

CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacao AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.contestacoes  a WHERE a.id_contestacao_op=idb ) as total,
a.id,
a.descricao
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op = b.id OR a.id_contestacao_op IS NULL
WHERE a.id_contestacao_op=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab))
AND (a.`status` = 'Em análise' OR a.`status` = 'Reanálise') 
GROUP BY a.id
);

SELECT * FROM fila_contestacao ORDER BY SUBSTRING(created_at,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_contestacoes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_contestacoes` (IN `idb` INT, IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_contestacoes;	

CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacoes AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.contestacoes a WHERE (a.id_contestacao_op=idb OR a.id_contestacao_op IS NULL) AND (a.`status`='Em Análise' OR a.`status`='Reanálise')) as total,
a.id,
a.id_parc,
a.cnpj_cpf,
a.descricao,
a.dias,
a.sla,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao

FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_parc = b.id
WHERE (a.id_contestacao_op=idb OR a.id_contestacao_op IS NULL)  
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Em Análise' OR a.`status`='Reanálise')
ORDER BY SUBSTRING(data_criacao,1,10) ASC 
);

SELECT * FROM fila_contestacoes ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_contestacoes_fechado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_contestacoes_fechado` (IN `idb` INT, IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_contestacoes_fechado;	

IF pesquisab = '%' THEN

CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacoes_fechado AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.contestacoes a WHERE a.id_parceiro=idb AND (a.`status`='Procedente' OR a.`status`='Improcedente')) as total,
a.id,
a.id_parc,
a.cnpj_cpf,
a.descricao,
a.dias,
a.sla,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op = b.id
WHERE a.id_contestacao_op=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Procedente' OR a.`status`='Improcedente')
AND SUBSTRING(a.data_tratamento,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()

ORDER BY SUBSTRING(data_criacao,1,10) ASC
);
ELSEIF pesquisab <> '%' THEN
CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacoes_fechado AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.contestacoes a WHERE a.id_parceiro=idb AND (a.`status`='Procedente' OR a.`status`='Improcedente')) as total,
a.id,
a.id_parc,
a.cnpj_cpf,
a.descricao,
a.dias,
a.sla,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op = b.id
WHERE a.id_contestacao_op=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Procedente' OR a.`status`='Improcedente')
ORDER BY SUBSTRING(data_criacao,1,10) ASC
);
END IF;

SELECT * FROM fila_contestacoes_fechado ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_contestacoes_fechado_sup`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_contestacoes_fechado_sup` (IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_contestacoes_fechado_sup;	

IF pesquisab = '%' THEN

CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacoes_fechado_sup AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.contestacoes a WHERE (a.`status`='Procedente' OR a.`status`='Improcedente')) as total,
a.id,
a.id_parc,
a.cnpj_cpf,
a.descricao,
c.endereco_anexo,
c.endereco_download as endereco_downloadparc,
a.descricao_defesa,
a.dias,
a.sla,
d.motivo,
e.submotivo,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op = b.id
LEFT JOIN portal_vivo.parceiros c ON c.id=a.id_parc 
LEFT JOIN portal_vivo.motivos d  ON a.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON a.submotivos = e.id
WHERE (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Procedente' OR a.`status`='Improcedente')
AND SUBSTRING(a.data_tratamento,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()

ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);
ELSEIF pesquisab <> '%' THEN
CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacoes_fechado_sup AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.contestacoes a WHERE (a.`status`='Procedente' OR a.`status`='Improcedente')) as total,
a.id,
a.id_parc,
a.cnpj_cpf,
a.descricao,
c.endereco_anexo,
c.endereco_download as endereco_downloadparc,
a.descricao_defesa,
a.dias,
a.sla,
d.motivo,
e.submotivo,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op = b.id
LEFT JOIN portal_vivo.parceiros c ON c.id=a.id_parc
LEFT JOIN portal_vivo.motivos d  ON a.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON a.submotivos = e.id 
WHERE  (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Procedente' OR a.`status`='Improcedente')
ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);
END IF;

SELECT * FROM fila_contestacoes_fechado_sup ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_contestacoes_fechado_sup_editar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_contestacoes_fechado_sup_editar` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS fila_contestacoes_fechado_sup_editar;	


CREATE TEMPORARY TABLE IF NOT EXISTS fila_contestacoes_fechado_sup_editar AS(

SELECT DISTINCT 
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
a.id,
a.id_parc,
a.cnpj_cpf,
a.descricao,
c.endereco_anexo,
f.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcont,
a.descricao_defesa,
a.dias,
a.sla,
d.motivo,
e.submotivo,
d.id as idmotivo,
e.id as idsubmotivo,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op = b.id
LEFT JOIN portal_vivo.parceiros c ON c.id=a.id_parc 
LEFT JOIN portal_vivo.motivos d  ON a.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON a.submotivos = e.id
LEFT JOIN portal_vivo.files f ON f.protocolo = a.protocolo AND f.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
WHERE (a.`status`='Procedente' OR a.`status`='Improcedente')
AND a.id=idb

ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);


SELECT * FROM fila_contestacoes_fechado_sup_editar ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_parceiro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_parceiro` (IN `idb` INT, IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_parceiro;	

CREATE TEMPORARY TABLE IF NOT EXISTS fila_parceiro AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.parceiros a WHERE a.id_parceiro=idb AND (a.`status`='Em Análise' OR a.`status`='Reanálise')) as total,
a.id,
a.cnpj_cpf,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
WHERE a.id_parceiro=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Em Análise' OR a.`status`='Reanálise')
GROUP BY a.id
);

SELECT * FROM fila_parceiro ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_parceiro_fechado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_parceiro_fechado` (IN `idb` INT, IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_parceiro_fechado;	

IF pesquisab = '%' THEN 

CREATE TEMPORARY TABLE IF NOT EXISTS fila_parceiro_fechado AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.parceiros a WHERE a.id_parceiro=idb AND (a.`status`='Procedente' OR a.`status`='Improcedente')) as total,
a.id,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento,
a.dias,
a.sla
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
WHERE a.id_parceiro=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Procedente' OR a.`status`='Improcedente') 
AND SUBSTRING(a.updated_at,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()
GROUP BY a.id
);
ELSEIF pesquisab <> '%' THEN

CREATE TEMPORARY TABLE IF NOT EXISTS fila_parceiro_fechado AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.parceiros a WHERE a.id_parceiro=idb AND (a.`status`='Procedente' OR a.`status`='Improcedente')) as total,
a.id,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento,
a.dias,
a.sla
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
WHERE a.id_parceiro=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND (a.`status`='Procedente' OR a.`status`='Improcedente')
GROUP BY a.id
);

END IF;
SELECT * FROM fila_parceiro_fechado ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `fila_parceiro_rea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `fila_parceiro_rea` (IN `idb` INT, IN `pesquisab` VARCHAR(255))  BEGIN

DROP TABLE IF EXISTS fila_parceiro_rea;	

CREATE TEMPORARY TABLE IF NOT EXISTS fila_parceiro_rea AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
b.nome,
(SELECT DISTINCT count(a.id) FROM portal_vivo.parceiros a WHERE a.id_parceiro=idb AND ( a.`status`='Reanálise')) as total,
a.id,
a.cnpj_cpf,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
WHERE a.id_parceiro=idb 
AND (a.pedido LIKE (pesquisab) 
     OR a.protocolo LIKE (pesquisab) 
     OR a.`status` LIKE (pesquisab) 
     OR DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') LIKE (pesquisab) 
     OR nome LIKE (pesquisab)) AND ( a.`status`='Reanálise')
AND a.reaberto='Sim'
GROUP BY a.id
);

SELECT * FROM fila_parceiro_rea ORDER BY SUBSTRING(created_at,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `form_reabrir_parceiro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_reabrir_parceiro` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_parceiro;	

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao_defesa,
a.endereco_anexo,
a.endereco_download,
b.nome,
a.id,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id  
WHERE a.id=idb 
ORDER BY SUBSTRING(data_criacao,1,10) ASC
);

SELECT * FROM form_visualiza_parceiro ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `form_visualiza_contestacoes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_visualiza_contestacoes` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_contestacoes;	

DROP TABLE IF EXISTS form_visualiza_contestacoes_protocolo;	

DROP TABLE IF EXISTS form_visualiza_contestacoes_prot;

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_prot AS(

SELECT
a.protocolo
FROM
portal_vivo.contestacoes a
WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_protocolo AS(
SELECT a.protocolo,a.revisao from portal_vivo.contestacoes a 
LEFT JOIN portal_vivo.parceiros b ON b.protocolo=a.protocolo WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes AS(

SELECT DISTINCT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao,
f.endereco_anexo,
f.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcontes,
b.nome,
a.id,
a.id_parc,
a.revisao,
(select a.revisao from  portal_vivo.contestacoes a INNER JOIN form_visualiza_contestacoes_protocolo b  ON a.protocolo=b.protocolo ORDER BY a.revisao DESC LIMIT 1)  as val,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
d.motivo,
e.submotivo,
c.descricao_defesa,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op= b.id
LEFT JOIN portal_vivo.parceiros c ON c.id=a.id_parc
LEFT JOIN portal_vivo.motivos d  ON a.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON a.submotivos = e.id
LEFT JOIN portal_vivo.files f ON f.protocolo = a.protocolo AND f.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
LEFT JOIN portal_vivo.form_visualiza_contestacoes_prot g ON g.protocolo=a.protocolo
WHERE a.id=idb
GROUP BY a.protocolo
ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);

SELECT * FROM form_visualiza_contestacoes ORDER BY SUBSTRING(data_criacao,1,10) ASC;




END$$

DROP PROCEDURE IF EXISTS `form_visualiza_contestacoes_abertas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_visualiza_contestacoes_abertas` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_contestacoes_abertas;	

DROP TABLE IF EXISTS form_visualiza_contestacoes_protocolo_abertas;	

DROP TABLE IF EXISTS form_visualiza_contestacoes_prot_abertas;

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_prot_abertas AS(

SELECT
a.protocolo
FROM
portal_vivo.contestacoes a
WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_protocolo_abertas AS(
SELECT a.protocolo,a.revisao from portal_vivo.contestacoes a 
LEFT JOIN portal_vivo.parceiros b ON b.protocolo=a.protocolo WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_abertas AS(

SELECT DISTINCT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao,
f.endereco_anexo,
f.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcontes,
b.nome,
a.id,
a.id_parc,
a.revisao,
(select a.revisao from  portal_vivo.contestacoes a INNER JOIN form_visualiza_contestacoes_protocolo_abertas b  ON a.protocolo=b.protocolo ORDER BY a.revisao DESC LIMIT 1)  as val,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
d.motivo,
e.submotivo,
c.descricao_defesa,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op= b.id
LEFT JOIN portal_vivo.parceiros c ON c.id=a.id_parc
LEFT JOIN portal_vivo.motivos d  ON a.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON a.submotivos = e.id
LEFT JOIN portal_vivo.files f ON f.protocolo = a.protocolo AND f.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
LEFT JOIN portal_vivo.form_visualiza_contestacoes_prot_abertas g ON g.protocolo=a.protocolo
WHERE a.protocolo=g.protocolo
GROUP BY a.protocolo,a.id
ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);

SELECT * FROM form_visualiza_contestacoes_abertas ORDER BY SUBSTRING(data_criacao,1,10) DESC;




END$$

DROP PROCEDURE IF EXISTS `form_visualiza_contestacoes_fechado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_visualiza_contestacoes_fechado` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_contestacoes;	

DROP TABLE IF EXISTS form_visualiza_contestacoes_protocolo;	

DROP TABLE IF EXISTS form_visualiza_contestacoes_prot;

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_prot AS(

SELECT
a.protocolo
FROM
portal_vivo.contestacoes a
WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes_protocolo AS(
SELECT a.protocolo,a.revisao from portal_vivo.contestacoes a 
LEFT JOIN portal_vivo.parceiros b ON b.protocolo=a.protocolo WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_contestacoes AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao,
f.endereco_anexo,
f.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcontes,
b.nome,
a.id,
a.revisao,
(select a.revisao from  portal_vivo.contestacoes a INNER JOIN form_visualiza_contestacoes_protocolo b  ON a.protocolo=b.protocolo ORDER BY a.revisao DESC LIMIT 1)  as val,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
d.motivo,
e.submotivo,
c.descricao_defesa,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as data_tratamento,
a.dias,
a.sla
FROM
portal_vivo.contestacoes a
LEFT JOIN portal_vivo.users b ON a.id_contestacao_op= b.id
LEFT JOIN portal_vivo.parceiros c ON c.id=a.id_parc
LEFT JOIN portal_vivo.motivos d  ON a.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON a.submotivos = e.id
LEFT JOIN portal_vivo.files f ON f.protocolo = a.protocolo AND f.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
LEFT JOIN portal_vivo.form_visualiza_contestacoes_prot g ON g.protocolo=a.protocolo
WHERE a.protocolo=g.protocolo
GROUP BY a.protocolo,a.id
ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);

SELECT * FROM form_visualiza_contestacoes ORDER BY SUBSTRING(data_criacao,1,10) DESC;




END$$

DROP PROCEDURE IF EXISTS `form_visualiza_parceiro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_visualiza_parceiro` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_parceiro;	
DROP TABLE IF EXISTS form_visualiza_parceiro_prot;

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro_prot AS(

SELECT
a.protocolo
FROM
portal_vivo.parceiros a
WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro AS(

SELECT DISTINCT 
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao_defesa,
c.endereco_anexo,
c.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcontes,
b.nome,
a.id,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
d.motivo,
e.submotivo,
g.descricao,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
LEFT JOIN portal_vivo.files c ON c.protocolo = a.protocolo AND c.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
LEFT JOIN portal_vivo.contestacoes g ON g.id_parc=a.id
LEFT JOIN portal_vivo.motivos d  ON g.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON g.submotivos = e.id
LEFT JOIN portal_vivo.form_visualiza_parceiro_prot f ON f.protocolo=a.protocolo
WHERE a.id = idb
GROUP BY a.id
);

SELECT * FROM form_visualiza_parceiro ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `form_visualiza_parceiro_abertas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_visualiza_parceiro_abertas` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_parceiro_abertas;	
DROP TABLE IF EXISTS form_visualiza_parceiro_prot_abertas;

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro_prot_abertas AS(

SELECT
a.protocolo
FROM
portal_vivo.parceiros a
WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro_abertas AS(

SELECT DISTINCT 
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao_defesa,
c.endereco_anexo,
c.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcontes,
b.nome,
a.id,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
d.motivo,
e.submotivo,
g.descricao,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
LEFT JOIN portal_vivo.files c ON c.protocolo = a.protocolo AND c.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
LEFT JOIN portal_vivo.contestacoes g ON g.id_parc=a.id
LEFT JOIN portal_vivo.motivos d  ON g.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON g.submotivos = e.id
LEFT JOIN portal_vivo.form_visualiza_parceiro_prot_abertas f ON f.protocolo=a.protocolo
WHERE a.protocolo = f.protocolo
GROUP BY a.id
);

SELECT * FROM form_visualiza_parceiro_abertas ORDER BY SUBSTRING(data_criacao,1,10) DESC;


END$$

DROP PROCEDURE IF EXISTS `form_visualiza_parceiro_fechado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `form_visualiza_parceiro_fechado` (IN `idb` INT)  BEGIN

DROP TABLE IF EXISTS form_visualiza_parceiro;	

DROP TABLE IF EXISTS form_visualiza_parceiro_protocolo;	

DROP TABLE IF EXISTS form_visualiza_parceiro_prot;

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro_prot AS(

SELECT
a.protocolo
FROM
portal_vivo.parceiros a
WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro_protocolo AS(
SELECT a.protocolo,a.revisao from portal_vivo.parceiros a 
LEFT JOIN portal_vivo.parceiros b ON b.protocolo=a.protocolo WHERE a.id=idb

);

CREATE TEMPORARY TABLE IF NOT EXISTS form_visualiza_parceiro AS(

SELECT
DATE_FORMAT(a.created_at,'%d/%m/%Y %H:%i:%s') as created_at,
a.protocolo,
a.pedido,
a.`status`,
a.cnpj_cpf,
a.descricao_defesa,
f.endereco_anexo,
f.endereco_download as endereco_downloadparc,
h.endereco_download as endereco_downloadcontes,
b.nome,
a.id,
a.revisao,
(select a.revisao from  portal_vivo.parceiros a INNER JOIN form_visualiza_parceiro_protocolo b  ON a.protocolo=b.protocolo ORDER BY a.revisao DESC LIMIT 1)  as val,
DATE_FORMAT(a.data_criacao,'%d/%m/%Y %H:%i:%s') as data_criacao,
d.motivo,
e.submotivo,
c.descricao,
DATE_FORMAT(a.updated_at,'%d/%m/%Y %H:%i:%s') as updated_at,
DATE_FORMAT(a.data_tratamento,'%d/%m/%Y %H:%i:%s') as data_tratamento,
a.dias,
a.sla
FROM
portal_vivo.parceiros a
LEFT JOIN portal_vivo.users b ON a.id_parceiro = b.id
LEFT JOIN portal_vivo.contestacoes c ON c.id_parc=a.id
LEFT JOIN portal_vivo.motivos d  ON c.motivos = d.id
LEFT JOIN portal_vivo.submotivos e  ON c.submotivos = e.id
LEFT JOIN portal_vivo.files f ON f.protocolo = a.protocolo AND f.tramite='Parceiro'
LEFT JOIN portal_vivo.files h ON h.protocolo = a.protocolo AND h.tramite='Contestacao'
LEFT JOIN portal_vivo.form_visualiza_parceiro_prot g ON g.protocolo=a.protocolo
WHERE a.protocolo=g.protocolo
GROUP BY a.protocolo,a.id
ORDER BY SUBSTRING(a.data_criacao,1,10) ASC
);

SELECT * FROM form_visualiza_parceiro ORDER BY SUBSTRING(data_criacao,1,10) ASC;


END$$

DROP PROCEDURE IF EXISTS `teste_3meses`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `teste_3meses` ()  BEGIN

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido_3_meses_proc1;

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido_3_meses_improc1;

DROP TABLE	
IF
	 EXISTS dashboard_portal_concluido_3_meses1;


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_portal_concluido_3_meses1(
	`Janp` INT (255),
	`Jani` INT (255),
	`Fevp` INT (255),
	`Fevi` INT (255),
	`Marp` INT (255),
	`Mari` INT (255),
	`Abrp` INT (255),
	`Abri` INT (255),
	`Maip` INT (255),
	`Maii` INT (255),
	`Junp` INT (255),
	`Juni` INT (255),
	`Julp` INT (255),
	`Juli` INT (255),
	`Agop` INT (255),
	`Agoi` INT (255),
	`Setp` INT (255),
	`Seti` INT (255),
	`Outp` INT (255),
	`Outi` INT (255),
	`Novp` INT (255),
	`Novi` INT (255),
	`Dezp` INT (255),
	`Dezi` INT (255)
	);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_concluido_3_meses_proc1 AS (
SELECT DISTINCT
 
  SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 01 THEN 1 ELSE 0 END ) 'Jan',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 02 THEN 1 ELSE 0 END ) 'Fev',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 03 THEN 1 ELSE 0 END ) 'Mar',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 04 THEN 1 ELSE 0 END ) 'Abr',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 05 THEN 1 ELSE 0 END ) 'Mai',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 06 THEN 1 ELSE 0 END ) 'Jun',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 07 THEN 1 ELSE 0 END ) 'Jul',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 08 THEN 1 ELSE 0 END ) 'Ago',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 09 THEN 1 ELSE 0 END ) 'Set',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 10 THEN 1 ELSE 0 END ) 'Out',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 11 THEN 1 ELSE 0 END ) 'Nov',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 12 THEN 1 ELSE 0 END ) 'Dez' 
FROM
	portal_vivo.contestacoes 
WHERE `status`='Procedente' 
AND SUBSTRING(updated_at,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()

);


CREATE TEMPORARY TABLE
IF
	NOT EXISTS dashboard_status_concluido_3_meses_improc1 AS (
SELECT DISTINCT
 
  SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 01 THEN 1 ELSE 0 END ) 'Jan',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 02 THEN 1 ELSE 0 END ) 'Fev',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 03 THEN 1 ELSE 0 END ) 'Mar',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 04 THEN 1 ELSE 0 END ) 'Abr',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 05 THEN 1 ELSE 0 END ) 'Mai',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 06 THEN 1 ELSE 0 END ) 'Jun',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 07 THEN 1 ELSE 0 END ) 'Jul',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 08 THEN 1 ELSE 0 END ) 'Ago',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 09 THEN 1 ELSE 0 END ) 'Set',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 10 THEN 1 ELSE 0 END ) 'Out',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 11 THEN 1 ELSE 0 END ) 'Nov',
	SUM( CASE DATE_FORMAT(updated_at, '%m' ) WHEN 12 THEN 1 ELSE 0 END ) 'Dez' 
FROM
	portal_vivo.contestacoes 
WHERE `status`='Improcedente' 
AND SUBSTRING(updated_at,1,10) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -90 DAY) AND CURRENT_DATE()

);	

UPDATE dashboard_portal_concluido_3_meses1 a,(SELECT * FROM dashboard_status_concluido_3_meses_proc1)aa  
SET a.`Janp`=aa.`Jan`
WHERE a.`Janp`=aa.`Jan`;



UPDATE dashboard_portal_concluido_3_meses1 a,(SELECT * FROM dashboard_status_concluido_3_meses_proc1)bb  
SET a.`Jani`=bb.`Jan`
WHERE a.`Jani`=bb.`Jan`;

/*UPDATE dashboard_portal_concluido_3_meses1 a,(SELECT * FROM dashboard_status_concluido_3_meses_proc1)aa  
SET a.`Janp`=aa.`Jan`,
	  a.`Fevp`=aa.`Fev`,
	  a.`Marp`=aa.`Mar`,
	  a.`Abrp`=aa.`Abr`,
	  a.`Maip`=aa.`Mai`,
	  a.`Junp`=aa.`Jun`,
	  a.`Julp`=aa.`Jul`,
	  a.`Agop`=aa.`Ago`,
	  a.`Setp`=aa.`Set`,
	  a.`Outp`=aa.`Out`,
	  a.`Novp`=aa.`Nov`,
	  a.`Dezp`=aa.`Dez`
WHERE a.`Janp`=aa.`Jan`
  AND	a.`Fevp`=aa.`Fev`
	AND a.`Marp`=aa.`Mar` 
	AND a.`Abrp`=aa.`Abr`
	AND a.`Maip`=aa.`Mai`
	AND a.`Junp`=aa.`Jun`
	AND a.`Julp`=aa.`Jul`
	AND a.`Agop`=aa.`Ago`
	AND a.`Setp`=aa.`Set`
	AND a.`Outp`=aa.`Out`
	AND a.`Novp`=aa.`Nov`
	AND a.`Dezp`=aa.`Dez`;*/

/*UPDATE dashboard_portal_concluido_3_meses1 a,(SELECT * FROM dashboard_status_concluido_3_meses_improc1)bb  
SET a.`Jani`=bb.`Jan`,
	  a.`Fevi`=bb.`Fev`,
	  a.`Mari`=bb.`Mar`,
	  a.`Abri`=bb.`Abr`,
	  a.`Maii`=bb.`Mai`,
	  a.`Juni`=bb.`Jun`,
	  a.`Juli`=bb.`Jul`,
	  a.`Agoi`=bb.`Ago`,
	  a.`Seti`=bb.`Set`,
	  a.`Outi`=bb.`Out`,
	  a.`Novi`=bb.`Nov`,
	  a.`Dezi`=bb.`Dez`  
WHERE a.`Jani`=bb.`Jan`
  AND	a.`Fevi`=bb.`Fev`
	AND a.`Mari`=bb.`Mar` 
	AND a.`Abri`=bb.`Abr`
	AND a.`Maii`=bb.`Mai`
	AND a.`Juni`=bb.`Jun`
	AND a.`Juli`=bb.`Jul`
	AND a.`Agoi`=bb.`Ago`
	AND a.`Seti`=bb.`Set`
	AND a.`Outi`=bb.`Out`
	AND a.`Novi`=bb.`Nov`
	AND a.`Dezi`=bb.`Dez`;
*/


SELECT * FROM dashboard_portal_concluido_3_meses1; 



END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contestacoes`
--

DROP TABLE IF EXISTS `contestacoes`;
CREATE TABLE IF NOT EXISTS `contestacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parc` int(11) DEFAULT NULL,
  `protocolo` varchar(11) DEFAULT NULL,
  `revisao` int(255) DEFAULT NULL,
  `pedido` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj_cpf` varchar(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao_defesa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_parceiro` int(11) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_anexo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_download` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_contestacao_op` int(255) DEFAULT NULL,
  `motivos` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `submotivos` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reaberto` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dias` int(255) DEFAULT NULL,
  `sla` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tramite` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Contestacao',
  `data_criacao` datetime DEFAULT NULL,
  `data_tratamento` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_parc` (`id_parc`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contestacoes`
--

INSERT INTO `contestacoes` (`id`, `id_parc`, `protocolo`, `revisao`, `pedido`, `cnpj_cpf`, `descricao_defesa`, `status`, `id_parceiro`, `email`, `endereco_anexo`, `endereco_download`, `id_contestacao_op`, `motivos`, `submotivos`, `descricao`, `reaberto`, `dias`, `sla`, `tramite`, `data_criacao`, `data_tratamento`, `created_at`, `updated_at`) VALUES
(1, 1, '00001', 1, '1-2236458659', '98.591.456/0001-45', 'teste', 'Procedente', 2, 'assisruas0495@gmail.com', '/images/1534725691.jpg/1534725691.jpg', '/images/1534725691.jpg/1534725691.jpg.zip', 10, '4', '129', 'teste unico', NULL, 3, 'Fora', 'Contestacao', '2018-08-21 17:26:15', '2018-08-31 17:48:55', '2018-09-21 19:52:48', '2018-09-21 19:52:48'),
(2, 2, '00002', 1, '1-3455896530', '87.965.423/0001-10', 'teste', 'Improcedente', 2, 'assisruas0495@gmail.com', '/images/1534958849.jpg/1534958849.jpg', '/images/1534958849.jpg/1534958849.jpg.zip', 6, '1', '1', 'teste', NULL, 2, 'Dentro', 'Contestacao', '2018-08-22 17:26:15', '2018-08-31 17:51:57', '2018-09-18 15:43:51', '2018-09-18 15:43:51'),
(32, 68, '00003', 1, '1-2236458660', '98.456.865/9000-12', 'teste', 'Improcedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 6, '2', '83', 'teste', NULL, 1, 'Dentro', 'Contestacao', '2018-08-30 18:33:36', '2018-07-31 16:19:49', '2018-09-18 15:43:54', '2018-09-18 15:43:54'),
(33, 69, '00002', 2, '1-3455896530', '87.965.423/0001-10', 'teste', 'Procedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 6, '2', '79', 'teste', 'Ok', 1, 'Dentro', 'Contestacao', '2018-08-30 18:34:57', '2018-08-31 18:24:06', '2018-09-18 15:43:58', '2018-09-18 15:43:58'),
(37, 74, '00003', 2, '1-2236458660', '98.456.865/9000-12', 'teste', 'Reanálise', 2, 'assisruas0495@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Ok', 107, 'Fora', 'Contestacao', '2018-09-03 10:24:45', '2018-09-18 10:40:11', '2019-01-31 14:38:06', '2019-01-31 14:38:06'),
(42, 79, '00004', 1, '1-2236458661', '98.456.865/9000-12', 'teste', 'Em Análise', 2, 'assisruas0495@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 107, 'Fora', 'Contestacao', '2018-09-03 10:57:06', '2018-09-18 10:40:11', '2019-01-31 14:38:06', '2019-01-31 14:38:06'),
(43, 80, '00005', 1, '1-2222222222', '98.586.533/0001-25', 'teste apresentação', 'Improcedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 6, '2', '81', 'tipo de negociação ', NULL, 0, 'Dentro', 'Contestacao', '2018-09-05 16:35:28', '2018-09-05 16:40:32', '2018-09-18 15:44:08', '2018-09-18 15:44:08'),
(44, 81, '00005', 2, '1-2222222222', '98.586.533/0001-25', 'não concordo', 'Improcedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 6, '2', '81', 'segue evidencias', 'Ok', 0, 'Dentro', 'Contestacao', '2018-09-05 16:44:03', '2018-09-05 16:45:39', '2018-09-18 15:44:11', '2018-09-18 15:44:11'),
(45, 82, '00006', 1, '00000000000', '00.000.000/0000-00', 'Novo Teste', 'Procedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 6, '11', 'placeholder', 'Falta anexo do CPF do gestor master', NULL, 0, 'Dentro', 'Contestacao', '2018-10-25 12:27:47', NULL, '2018-10-25 14:43:58', '2018-10-25 14:43:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contestacoes_ofensores`
--

DROP TABLE IF EXISTS `contestacoes_ofensores`;
CREATE TABLE IF NOT EXISTS `contestacoes_ofensores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contestacoes_ofensores`
--

INSERT INTO `contestacoes_ofensores` (`id`, `item`) VALUES
(19, 'INDEVIDO'),
(2, 'ANÁLISE'),
(3, 'INPUT'),
(4, 'GN GUARDIAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `protocolo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco_anexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_download` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tramite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_parc2` (`protocolo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `files`
--

INSERT INTO `files` (`id`, `protocolo`, `filename`, `endereco_anexo`, `endereco_download`, `tramite`, `created_at`, `updated_at`) VALUES
(3, '00003', '[\"Chrysanthemum.jpg\",\"Desert.jpg\"]', '/images/00003parc', '/images/00003parc.zip', 'Parceiro', '2018-08-30 21:33:37', '2018-08-30 21:33:37'),
(4, '00002', '[\"Hydrangeas.jpg\"]', '/images/00002parc', '/images/00002parc.zip', 'Parceiro', '2018-08-30 21:35:08', '2018-08-30 21:35:08'),
(5, '00001', '[\"autorizado.jpg\"]', '/images/00001parc', '/images/00001parc.zip', 'Parceiro', '2018-08-30 21:59:26', '2018-08-30 21:59:26'),
(6, '00003', '[\"Desert.jpg\",\"Koala.jpg\"]', '/images/00003contes', '/images/00003contes.zip', 'Contestacao', '2018-08-31 19:19:49', '2018-08-31 19:19:49'),
(7, '00001', '[\"Hydrangeas.jpg\",\"Tulips.jpg\"]', '/images/00001contes', '/images/00001contes.zip', 'Contestacao', '2018-08-31 20:48:55', '2018-08-31 20:48:55'),
(8, '00002', '[\"Tulips.jpg\",\"Koala.jpg\"]', '/images/00002contes', '/images/00002contes.zip', 'Contestacao', '2018-08-31 20:51:57', '2018-08-31 20:51:57'),
(9, '00002', '[\"Desert.jpg\"]', '/images/00002contes', '/images/00002contes.zip', 'Contestacao', '2018-08-31 21:24:07', '2018-08-31 21:24:07'),
(10, '00003', '[\"Chrysanthemum.jpg\"]', '/images/00003parc', '/images/00003parc.zip', 'Parceiro', '2018-09-03 13:24:45', '2018-09-03 13:24:45'),
(11, '00005', '[\"Desert.jpg\"]', '/images/00005parc', '/images/00005parc.zip', 'Parceiro', '2018-09-05 19:35:28', '2018-09-05 19:35:28'),
(12, '00005', '[\"Lighthouse.jpg\",\"Penguins.jpg\"]', '/images/00005contes', '/images/00005contes.zip', 'Contestacao', '2018-09-05 19:40:32', '2018-09-05 19:40:32'),
(13, '00005', '[\"Koala.jpg\"]', '/images/00005parc', '/images/00005parc.zip', 'Parceiro', '2018-09-05 19:44:04', '2018-09-05 19:44:04'),
(14, '00005', '[\"Tulips.jpg\"]', '/images/00005contes', '/images/00005contes.zip', 'Contestacao', '2018-09-05 19:45:39', '2018-09-05 19:45:39'),
(15, '00001', '[\"Chrysanthemum.jpg\"]', '/images/00001contes', '/images/00001contes.zip', 'Contestacao', '2018-09-21 19:36:53', '2018-09-21 19:36:53'),
(16, '00001', '[\"Hydrangeas.jpg\"]', '/images/00001contes', '/images/00001contes.zip', 'Contestacao', '2018-09-21 19:52:48', '2018-09-21 19:52:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivos`
--

DROP TABLE IF EXISTS `motivos`;
CREATE TABLE IF NOT EXISTS `motivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `motivos`
--

INSERT INTO `motivos` (`id`, `motivo`) VALUES
(1, 'TERMO SMP X VIVOCORP'),
(2, 'FERRAMENTA COMERCIAL'),
(3, 'CONTRATO DE PERMANÊNCIA'),
(4, 'DOCUMENTAÇÃO / VALORES'),
(5, 'INTERGRALL'),
(6, 'OUTROS'),
(7, 'CEDENTE'),
(8, 'CESSIONÁRIO'),
(9, 'CONTA / TERMIO TT'),
(10, 'VIVOCORP'),
(11, 'DOCUMENTAÇÃO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ofensores`
--

DROP TABLE IF EXISTS `ofensores`;
CREATE TABLE IF NOT EXISTS `ofensores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ofensores`
--

INSERT INTO `ofensores` (`id`, `item`) VALUES
(19, 'INDEVIDO'),
(2, 'ANÁLISE'),
(3, 'INPUT'),
(4, 'GN GUARDIAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

DROP TABLE IF EXISTS `parceiros`;
CREATE TABLE IF NOT EXISTS `parceiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protocolo` varchar(11) DEFAULT NULL,
  `revisao` int(255) DEFAULT NULL,
  `pedido` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj_cpf` varchar(19) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao_defesa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_parceiro` int(11) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_anexo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco_download` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reaberto` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dias` int(255) DEFAULT NULL,
  `sla` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tramite` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Parceiro',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_tratamento` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `protocolo`, `revisao`, `pedido`, `cnpj_cpf`, `descricao_defesa`, `status`, `id_parceiro`, `email`, `endereco_anexo`, `endereco_download`, `reaberto`, `dias`, `sla`, `tramite`, `data_criacao`, `data_tratamento`, `created_at`, `updated_at`) VALUES
(1, '00001', 1, '1-2236458659', '98.591.456/0001-45', 'teste', 'Procedente', 2, 'assisruas0495@gmail.com', '/images/1534725691.jpg/1534725691.jpg', '/images/1534725691.jpg/1534725691.jpg.zip', NULL, 0, 'Dentro', 'Parceiro', '2018-08-22 17:30:01', '2018-08-22 17:31:17', '2018-09-17 20:32:35', '2018-09-17 20:32:35'),
(2, '00002', 1, '1-3455896530', '87.965.423/0001-10', 'teste', 'Improcedente', 2, 'assisruas0495@gmail.com', '/images/1534958849.jpg/1534958849.jpg', '/images/1534958849.jpg/1534958849.jpg.zip', NULL, 0, 'Dentro', 'Parceiro', '2018-08-22 17:30:01', '2018-08-26 17:15:56', '2018-09-17 20:32:45', '2018-09-17 20:32:45'),
(68, '00003', 1, '1-2236458660', '98.456.865/9000-12', 'teste', 'Improcedente', 2, 'assisruas0495@gmail.com', NULL, NULL, NULL, 11, 'Fora', 'Parceiro', '2018-08-30 18:33:36', '2018-09-10 17:15:56', '2018-09-25 22:49:57', '2018-09-25 22:49:57'),
(69, '00002', 2, '1-3455896530', '87.965.423/0001-10', 'teste', 'Procedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 'Ok', 11, 'Fora', 'Parceiro', '2018-08-30 18:34:57', '2018-09-02 17:24:34', '2018-09-19 13:33:33', '2018-09-19 13:33:33'),
(74, '00003', 2, '1-2236458660', '98.456.865/9000-12', 'teste', 'Reanálise', 2, 'assisruas0495@gmail.com', NULL, NULL, 'Ok', NULL, NULL, 'Parceiro', '2018-09-03 10:24:45', '2018-09-03 10:24:45', '2018-09-17 20:31:45', '2018-09-17 20:31:45'),
(79, '00004', 1, '1-2236458661', '98.456.865/9000-12', 'teste', 'Em Análise', 2, 'assisruas0495@gmail.com', NULL, NULL, NULL, NULL, NULL, 'Parceiro', '2018-09-03 10:57:06', '2018-09-03 10:57:06', '2018-09-17 20:31:48', '2018-09-17 20:31:48'),
(80, '00005', 1, '1-2222222222', '98.586.533/0001-25', 'teste apresentação', 'Improcedente', 2, 'assisruas0495@gmail.com', NULL, NULL, NULL, 11, 'Fora', 'Parceiro', '2018-09-05 16:35:28', '2018-09-17 17:15:56', '2018-10-02 15:35:46', '2018-10-02 15:35:46'),
(81, '00005', 2, '1-2222222222', '98.586.533/0001-25', 'não concordo', 'Improcedente', 2, 'assisruas0495@gmail.com', NULL, NULL, 'Ok', 11, 'Fora', 'Parceiro', '2018-09-05 16:44:03', '2018-09-17 17:15:56', '2018-10-02 15:35:46', '2018-10-02 15:35:46'),
(82, '00006', 1, '00000000000', '00.000.000/0000-00', 'Novo Teste', 'Procedente', 2, 'assisruas0495@gmail.com', NULL, NULL, NULL, 5, 'Dentro', 'Parceiro', '2018-10-25 12:27:47', '2018-10-25 12:27:47', '2018-11-01 13:49:13', '2018-11-01 13:49:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfils`
--

DROP TABLE IF EXISTS `perfils`;
CREATE TABLE IF NOT EXISTS `perfils` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `perfil_desc` int(255) DEFAULT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `perfils`
--

INSERT INTO `perfils` (`id`, `perfil_desc`, `cargo`, `setor`) VALUES
(1, 1, 'Administrador', 'Todos'),
(2, 2, 'Gerência', 'Gerencia'),
(3, 3, 'Diretoria', 'Diretor'),
(4, 4, 'Analista de Suporte', 'Suporte'),
(5, 5, 'Parceiro', 'Parceiro'),
(6, 6, 'Contestação', 'Contestacao'),
(7, 7, 'Supervisor', 'Supervisor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `submotivos`
--

DROP TABLE IF EXISTS `submotivos`;
CREATE TABLE IF NOT EXISTS `submotivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submotivo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_submotivo` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_submotivo` (`id_submotivo`)
) ENGINE=MyISAM AUTO_INCREMENT=267 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `submotivos`
--

INSERT INTO `submotivos` (`id`, `submotivo`, `id_submotivo`) VALUES
(1, 'As informações estão de acordo entre Vivocorp e Receita Federal?', 1),
(2, 'A INSCRIÇÃO ESTADUAL e SITUAÇÃO CADASTRAL esta de acordo entre Vivocorp e Sintegra?', 1),
(3, 'A(s) pessoa(s) que assinou(aram) o Termo SMP tem poderes para responder pela empresa?', 1),
(4, 'O CNPJ esta igual entre Vivocorp e Termo SMP?', 1),
(5, 'O DDD esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(6, 'O TIPO DE NEGOCIAÇÃO esta de acordo entre Termo SMP e Ferramenta Comercial (vide Descrição)?', 1),
(7, 'O DESCONTO do SERVIÇO DE DADOS esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(8, 'O TIPO DE SOLICITAÇÃO esta de acordo entre Termo SMP e Ferramenta Comercial (vide Descrição)?', 1),
(9, 'O CNPJ esta igual entre Ferramenta Comercial e Termo SMP?', 1),
(10, ' A QTD DE LINHAS/SIMCARD esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(11, 'A VIGÊNCIA DO CONTRATO esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(12, 'Consta no Termo SMP as assinaturas exigidas pelo cliente (individual ou em conjunto)?', 1),
(13, 'A RAZÃO SOCIAL é a mesma entre Vivocorp e Termo SMP?', 1),
(14, 'O NOME/RG/ASSINATURA DO REPRESENTANTE LEGAL (1) esta igual entre o documento pessoal  e o Termo SMP?', 1),
(15, 'O NOME/RG/ASSINATURA DO REPRESENTANTE LEGAL(2) esta igual entre documento pessoal e Termo SMP?', 1),
(16, 'O CNPJ/DDD/CONTA esta igual entre Form.Complementar e Termo SMP?', 1),
(17, 'A CONTA esta igual entre Vivocorp e Termo SMP?', 1),
(18, 'O Termo SMP está vigente?', 1),
(19, 'A QTD/TIPO/VALOR de SERVIÇOS ADICIONAIS DE VOZ esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(20, 'A QTD/TIPO/VALOR de SERVIÇO DE DADOS esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(21, 'A Nº/QTD LINHAS está igual entre Form.Complementar e Termo SMP?', 1),
(22, 'O CÓDIGO AGENTE no Termo SMP está igual ao Adabas na Vivocorp?', 1),
(23, 'A OBSERVAÇÃO está igual entre Vivocorp e Termo SMP?', 1),
(24, 'O DESCONTO SERVIÇO DE DADOS esta igual entre Vivocorp e Termo SMP?', 1),
(25, 'O TIPO/QTD/VALOR de SERVIÇO DE DADOS esta igual entre Vivocorp e Termo SMP?', 1),
(26, 'O TIPO/QTD/VALOR de SERVIÇOS ADICIONAIS DE VOZ esta igual entre Vivocorp e Termo SMP?', 1),
(27, 'A QTD LINHAS/SIMCARD esta igual entre Vivocorp e Termo SMP?', 1),
(28, 'A VIGÊNCIA DO CONTRATO esta igual entre Vivocorp e Termo SMP?', 1),
(29, 'O DDD esta igual entre Vivocorp e Termo SMP?', 1),
(30, 'O TIPO DE NEGOCIAÇÃO esta igual entre Vivocorp e Termo SMP?', 1),
(31, 'O TIPO DE SOLICITAÇÃO esta igual entre Vivocorp e Termo SMP?', 1),
(32, 'O GESTOR MASTER no Termo SMP é um representante legal da empresa?', 1),
(33, 'O GESTOR DA CONTA informado no Termo SMP é o gestor da conta cadastrado no Vivocorp?', 1),
(34, 'O NOME/CPF/TELEFONE/EMAIL DO GESTOR (Master e Conta) esta igual entre Vivocorp e Termo SMP?', 1),
(35, 'A QTD/VALOR de PACOTES está igual entre o Contrato de Permanência de Internet/Voz e o Termo SMP?', 1),
(36, 'O DDD esta igual entre Contrato de Permanência de Internet/Voz  e o Termo SMP?', 1),
(37, 'O CNPJ esta igual entre Contrato de Permanência de Internet/Voz e o Termo SMP?', 1),
(38, 'A CONTA informada no Termo SMP tem linhas com o Serviço Gestão?', 1),
(39, 'O CNPJ esta igual entre Contrato Gestão e Termo SMP?', 1),
(40, 'Consta no Termo SMP assinatura/nome/carimbo do representante de vendas?', 1),
(41, 'O TERMO DE ADESÃO (VERSO DO SMP) foi assinado pelos mesmos representantes que assinaram o TERMO SMP?', 1),
(42, 'A DATA (DE ASSINATURA) DO TERMO SMP esta igual entre Vivocorp e Termo SMP?', 1),
(43, 'A QTD LINHAS/SIMCARD/APARELHOS esta igual entre Vivocorp e Termo SMP?', 1),
(44, 'O VALOR DO SIMCARD esta igual entre Vivocorp e Termo SMP?', 1),
(45, 'O TIPO/MARCA/VALOR UNITARIO DO APARELHO esta igual entre Vivocorp e Termo SMP?', 1),
(46, 'O Nº/VALOR DE PARCELAS DA COBRANÇA DO APARELHO esta igual entre Vivocorp e Termo SMP?', 1),
(47, 'O DESCONTO PROMOCIONAL MENSAL/DESCONTO VIXO FIXO esta igual entre Vivocorp e Termo SMP?', 1),
(48, 'O CNPJ/DDD/CONTA esta igual entre  Form.Complementar e Termo SMP?', 1),
(49, 'O TIPO DE NEGOCIAÇÃO esta igual entre Ferramenta Comercial e Termo SMP?', 1),
(50, 'O TIPO DE SOLICITAÇÃO esta igual entre Ferramenta Comercial e Termo SMP?', 1),
(51, 'A VIGÊNCIA DO CONTRATO esta igual entre Ferramenta Comercial e Termo SMP?', 1),
(52, 'O CNPJ/DDD/CONTA esta igual entre Formulário Complementar e Termo SMP?', 1),
(53, 'Os dados do Formulário Complementar (Coluna SMP/Nº Linha)referem-se à coluna negociada no Termo SMP?', 1),
(54, 'A DATA (DE ASSINATURA) no Fomulário Complementar esta igual ou superior ao Termo SMP?', 1),
(55, 'A QTD DE LINHAS/SIMCARD esta igual entre Vivocorp e Termo SMP?', 1),
(56, 'O PLANO DE SERVIÇO (VOZ E DADOS) esta igual entre Vivocorp e Termo SMP?', 1),
(57, 'O VALOR DE ASSINATURA DO PLANO esta igual entre Vivocorp e Termo SMP?', 1),
(58, 'O PACOTE DE MINUTOS POR LINHA esta igual entre Vivocorp e Termo SMP?', 1),
(59, 'O VALOR DO PACOTE DE MINUTOS POR LINHA esta igual entre Vivocorp e Termo SMP?', 1),
(60, 'O COMPARTILHAMENTO PACOTE DE MINUTOS (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 1),
(61, 'Os BÔNUS MINUTOS LOCAIS estão iguais entre Vivocorp e Termo SMP?', 1),
(62, 'O PACOTE LD01 (ISENÇÃO DE ROAMING) esta igual entre Vivocorp e Termo SMP?', 1),
(63, 'O DEGRAU (TARIFAÇÃO LONGA DISTÂNCIA) esta igual entre Vivocorp e Termo SMP?', 1),
(64, 'O TIPO/QTD/VALOR de PACOTES ADICIONAIS DE LONGA DISTÂNCIA esta igual entre Vivocorp e Termo SMP?', 1),
(65, 'A ISENÇÃO (TRADE IN) esta igual entre Vivocorp e Termo SMP?', 1),
(66, 'A ASSINATURA (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 1),
(67, 'A TARIFA VC1 DENTRO DA FRANQUIA (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 1),
(68, 'O EXCEDENTE VC1 ON NET/OFF NET/M-F (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 1),
(69, 'O VALOR da TARIFA DO DEGRAU PACOTE ROAMING FLEX VC2/VC3 esta igual entre Vivocorp e Termo SMP?', 1),
(70, 'A QUANTIDADE DE LINHAS com o SERVIÇO GESTÃO está igual entre Termo SMP e Vivocorp?', 1),
(71, 'Os serviços ausentes do Termos SMP e constantes atualmente na linha estão com ação ATUALIZAR ou -?', 1),
(72, 'O TIPO/VALOR do PACOTE DE MINUTOS POR LINHA esta igual entre Vivocorp e Termo SMP?', 1),
(73, 'O EXCEDENTE VC1 ON NET/OFF NET/ M-F (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 1),
(74, 'O CÓDIGO AGENTE no Termo SMP está igual ao Adabas no Vivocorp?', 1),
(75, 'O CNPJ/DDD/CONTA esta igual entre Termo de PN, Form.Complementar de PN e Termo SMP?', 1),
(76, 'A Nº/QTD LINHAS está igual entre Termo de PN, Form.Complementar de PN e Termo SMP?', 1),
(77, 'O COMPARTILHAMENTO PACOTE DE MINUTOS (PLANO FLEX) esta igual entre Termo SMP e Ferramenta Comercial?', 1),
(78, 'Os planos/serviços ausentes do Termos SMP e constantes atualmente na linha estão com ação ATUALIZAR?', 1),
(79, 'O CNPJ esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(80, 'O TIPO DE SOLICITAÇÃO esta de acordo entre Termo SMP e Ferramenta Comercial (vide Descrição)?', 2),
(81, 'O TIPO DE NEGOCIAÇÃO esta de acordo entre Termo SMP e Ferramenta Comercial (vide Descrição)?', 2),
(82, 'O DDD esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(83, 'A VIGÊNCIA DO CONTRATO esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(84, ' A QTD DE LINHAS/SIMCARD/APARELHOS esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(85, 'A MARCA/TIPO/MODELO DE APARELHOS ou SIMCARD esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(86, 'O VALOR UNITÁRIO DO APARELHO/SIMCARD esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(87, 'O Nº/VALOR DE PARCELAS esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(88, 'O PLANO DE SERVIÇOS (VOZ E DADOS) esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(89, 'A QTD/VALOR de PACOTE DE MINUTOS POR LINHA esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(90, 'O COMPARTILHAMENTO PACOTE DE MINUTOS (PLANO FLEX) esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(91, 'Os BÔNUS MINUTOS LOCAIS estão iguais entre Termo SMP e Ferramenta Comercial?', 2),
(92, 'O PACOTE LD01 (ISENÇÃO DE ROAMING) esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(93, 'O DEGRAU (TARIFAÇÃO LONGA DISTÂNCIA) esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(94, 'A QTD/TIPO/VALOR de PACOTES ADICIONAIS LONGA DISTÂNCIA esta igual entre SMP e Ferramenta Comercial?', 2),
(95, 'A QTD/TIPO/VALOR de SERVIÇOS ADICIONAIS DE VOZ esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(96, 'A QTD/TIPO/VALOR de SERVIÇO DE DADOS esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(97, 'O DESCONTO do SERVIÇO DE DADOS esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(98, 'O DESCONTO PROMOCIONAL MENSAL/VIVO FIXO esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(99, 'A ISENÇÃO (TRADE IN) esta igual ente Termo SMP e Ferramenta Comercial?', 2),
(100, 'A ASSINATURA (PLANO FLEX) esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(101, 'A TARIFA VC1 DENTRO DA FRANQUIA esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(102, 'O VALOR TARIFA DEGRAU PACOTE ROAMING FLEX VC2/VC3 esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(103, 'A ALÇADA esta igual entre Ferramenta Comercial e Vivocorp?', 2),
(104, 'A(s) pessoa(s) que assinou(aram) o Termo SMP tem poderes para responder pela empresa?', 2),
(105, 'O DDD esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(106, 'A QTD DE LINHAS/SIMCARD esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(107, 'O VALOR DO SIMCARD esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(108, 'O PLANO DE SERVIÇOS (VOZ E DADOS) esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(109, 'A QTD/VALOR de PACOTE DE MINUTOS POR LINHA esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(110, 'O COMPARTILHAMENTO PACOTE DE MINUTOS (PLANO FLEX) esta igual entre Ferramenta Comercial e SMP?', 2),
(111, 'Os BÔNUS MINUTOS LOCAIS estão iguais entre Ferramenta Comercial e Termo SMP?', 2),
(112, 'O PACOTE LD01 (ISENÇÃO DE ROAMING) esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(113, 'O DEGRAU (TARIFAÇÃO LONGA DISTÂNCIA) esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(114, 'O TIPO/QTD/VALOR de PACOTES ADICIONAIS LONGA DISTÂNCIA esta igual entre Ferramenta Comercial e SMP?', 2),
(115, 'O TIPO/QTD/VALOR de SERVIÇOS ADICIONAIS DE VOZ esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(116, 'O TIPO/QTD/VALOR de SERVIÇO DE DADOS esta igual entre Ferramenta Comercial e  Termo SMP?', 2),
(117, 'O DESCONTO do SERVIÇO DE DADOS esta igual entre Ferramenta Comercial e  Termo SMP?', 2),
(118, 'A ISENÇÃO (TRADE IN) esta igual ente Ferramenta Comercial e Termo SMP?', 2),
(119, 'A ASSINATURA (PLANO FLEX) esta igual entre Ferramenta Comercial e Termo SMP?', 2),
(120, 'A TARIFA VC1 DENTRO DA FRANQUIA esta igual entre Ferramenta Comerciale Termo SMP?', 2),
(121, 'A QTD DE LINHAS esta igual entre Ferramenta Comercial, Form.Complementar e Termo SMP?', 2),
(122, ' A QTD DE LINHAS/SIMCARD esta igual entre Termo SMP e Ferramenta Comercial?', 2),
(123, 'O CNPJ esta igual entre Contrato de Permanência de Internet/Voz e o Termo SMP?', 3),
(124, 'O DDD esta igual entre Contrato de Permanência de Internet/Voz  e o Termo SMP?', 3),
(125, 'A QTD/VALOR de PACOTES está igual entre o Contrato de Permanência de Internet/Voz e o Termo SMP?', 3),
(126, 'A DATA (DE ASSINATURA) no Contrato de Permanência de Internet/Voz está igual ou superior a do SMP?', 3),
(127, 'A pessoa que assinou o Contrato de Permanência de Internet/Voz é representante legal da empresa?', 3),
(128, 'Consta no Contrato de Permanência as assinaturas exigidas pelo cliente (individual ou em conjunto)?', 3),
(129, 'A DOCUMENTAÇÃO DO CADASTRO está vigente?', 4),
(130, 'Há DOCUMENTO PESSOAL com assinatura que permita validação da assinatura?', 4),
(131, 'A  VALOR DA PARCELA DA COBRANÇA DO APARELHO é superior a R$ 10,00 (Dez Reais)?', 4),
(132, 'A linha da troca possui o(s) serviço(s) obrigatório(s) informados na Tabela de Blindagem vigente?', 4),
(133, 'A DATA DE ASSINATURA do SMP é superior a 90 dias. Há \"\"de acordo\"\"executivo?', 4),
(134, 'A QTD LINHAS/SIMCARD/APARELHOS esta igual entre Vivocorp e Termo SMP?', 4),
(135, 'O VALOR DO SIMCARD esta igual entre Vivocorp e Termo SMP?', 4),
(136, 'O TIPO/MARCA/VALOR UNITARIO DO APARELHO esta igual entre Vivocorp e Termo SMP?', 4),
(137, 'O Nº/VALOR DE PARCELAS DA COBRANÇA DO APARELHO esta igual entre Vivocorp e Termo SMP?', 4),
(138, 'O PLANO DE SERVIÇO (VOZ E DADOS) esta igual entre Vivocorp e Termo SMP?', 4),
(139, 'O VALOR DE ASSINATURA DO PLANO esta igual entre Vivocorp e Termo SMP?', 4),
(140, 'O TIPO/VALOR do PACOTE DE MINUTOS POR LINHA esta igual entre Vivocorp e Termo SMP?', 4),
(141, 'O COMPARTILHAMENTO PACOTE DE MINUTOS (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 4),
(142, 'Os BÔNUS MINUTOS LOCAIS estão iguais entre Vivocorp e Termo SMP?', 4),
(143, 'O PACOTE LD01 (ISENÇÃO DE ROAMING) esta igual entre Vivocorp e Termo SMP?', 4),
(144, 'O DEGRAU (TARIFAÇÃO LONGA DISTÂNCIA) esta igual entre Vivocorp e Termo SMP?', 4),
(145, 'O TIPO/QTD/VALOR de PACOTES ADICIONAIS DE LONGA DISTÂNCIA esta igual entre Vivocorp e Termo SMP?', 4),
(146, 'O DESCONTO PROMOCIONAL MENSAL/DESCONTO VIXO FIXO esta igual entre Vivocorp e Termo SMP?', 4),
(147, 'A ISENÇÃO (TRADE IN) esta igual entre Vivocorp e Termo SMP?', 4),
(148, 'A ASSINATURA (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 4),
(149, 'A TARIFA VC1 DENTRO DA FRANQUIA (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 4),
(150, 'O EXCEDENTE VC1 ON NET/OFF NET/ M-F (PLANO FLEX) esta igual entre Vivocorp e Termo SMP?', 4),
(151, 'O VALOR da TARIFA DO DEGRAU PACOTE ROAMING FLEX VC2/VC3 esta igual entre Vivocorp e Termo SMP?', 4),
(152, 'O NOME/RG/ASSINATURA REPRESENT LEGAL esta igual entre doc pessoal e Form.Complementar?', 4),
(153, 'Há no Form.Complementar as assinaturas exigidas pelo cliente (individual ou conjunto)?', 4),
(154, 'A(s) pessoa(s) que assinou(aram) o Form.Complementar tem poderes para responder pela empresa?', 4),
(155, 'Consta no Form.Complementar a assinatura/nome/carimbo do Representante de Vendas?', 4),
(156, 'A DATA DE ASSINATURA do Form.Complementar está igual ou superior a data de assinatura do SMP?', 4),
(157, 'A  DATA (ASSINATURA) no Form.Complementar é superior a 90 dias. Consta na o \"\"de acordo\"\"?', 4),
(158, 'As linhas constam no Mailing de Troca?', 4),
(159, 'Os planos/serviços ausentes do Termos SMP e constantes atualmente na linha estão com ação ATUALIZAR?', 4),
(160, 'Os planos/serviços que serão substiuídos pelos constantes no SMP estão com ação EXCLUIR no Vivocorp?', 4),
(161, 'Os planos/serviços constantes no SMP estão com ação NOVA  no Vivocorp?', 4),
(162, 'O DESCONTO PROMOCIONAL MENSAL ANTIGO esta com ação ATUALIZAR no Vivocorp?', 4),
(163, 'O DESCONTO PROMOCIONAL MENSAL NOVO esta com ação NOVA no Vivocorp?', 4),
(164, 'O PARCELAMENTO ANTIGO (DO APARELHO)  esta com ação ATUALIZAR no Vivocorp?', 4),
(165, 'O PARCELAMENTO NOVO (DO APARELHO) esta com ação NOVA no Vivocorp?', 4),
(166, 'A RAZÃO SOCIAL/CNPJ esta igual entre Intergrall e Vivocorp?', 5),
(167, 'O ENDEREÇO esta igual entre Intergrall e Vivocorp?', 5),
(168, 'O TIPO DE SOLICITAÇÃO esta igual entre Vivocorp e Intergrall?', 5),
(169, 'O TIPO DE NEGOCIAÇÃO esta igual ente Vivocorp e Intergrall?', 5),
(170, 'O PRAZO CONTRATUAL esta igual entre Vivocorp e Intergrall?', 5),
(171, 'O DDD esta igual entre Vivocorp e Intergrall?', 5),
(172, 'A OPERADORA DOADORA está igual entre Vivocorp e Intergrall?', 5),
(173, 'O Nº DAS LINHAS (PORTABILIDADE) esta igual entre Vivocorp e Intergrall?', 5),
(174, 'A QTD LINHAS/SIMCARD/APARELHOS esta igual entre Vivocorp e Intergrall?', 5),
(175, 'O VALOR DO APARELHO e SIMCARD esta igual entre Vivocorp e Intergrall?', 5),
(176, 'O TIPO/MARCA/MODELO DE APARELHO ou SIMCARD esta igual entre Vivocorp e Intergrall?', 5),
(177, 'O Nº/VALOR DE PARCELAS DA COBRANÇA DO APARELHO esta igual entre Vivocorp e Intergrall?', 5),
(178, 'O DESCONTO PROMOCIONAL MENSAL esta igual entre Vivocorp e Intergrall?', 5),
(179, 'O TIPO/VALOR DE ASSINATURA DO PLANO DE SERVIÇO (VOZ E DADOS) esta igual entre Vivocorp e Intergrall?', 5),
(180, 'O TIPO/VALOR DO PACOTE DE MINUTOS POR LINHA (PLANO LD) esta igual entre Vivocorp e Intergrall?', 5),
(181, 'Os BÔNUS MINUTOS LOCAIS estão iguais entre  Vivocorp e Intergrall?', 5),
(182, 'O PACOTE LD01 (ISENÇÃO DE ROAMING) esta igual entre Vivocorp e Intergrall?', 5),
(183, 'O DEGRAU (TARIFAÇÃO LONGA DISTÂNCIA) esta igual entre Vivocorp e Intergrall?', 5),
(184, 'O TIPO/QTD/VALOR de PACOTES ADICIONAIS DE LONGA DISTÂNCIA esta igual entre Vivocorp e Intergrall?', 5),
(185, 'O TIPO/QTD/VALOR de SERVIÇOS ADICIONAIS DE VOZ esta igual entre Vivocorp e Intergrall?', 5),
(186, 'O TIPO/QTD/VALOR de  SERVIÇO DE DADOS esta igual entre  Vivocorp e Intergrall?', 5),
(187, 'O DESCONTO do SERVIÇO DE DADOS esta igual entre Vivocorp e Intergrall?', 5),
(188, 'A ISENÇÃO (TRADE IN) esta igual entre Vivocorp e Intergrall?', 5),
(189, 'A ALÇADA MANUAL esta igual entre Vivocorp e Intergrall?', 5),
(190, 'A OBSERVAÇÃO está correspondente entre Vivocorp e Intergrall?', 5),
(191, 'O print de tela do Intergrall está em formato PDF?', 5),
(192, 'A SEGMENTAÇÃO do cliente está de acordo entre Intergrall e Tabela de Telelindagem?', 5),
(193, 'As informações estão de acordo entre Vivocorp e Receita Federal?', 6),
(194, 'Há pedido complementar para tratar o restante da negociação de TROCA?', 6),
(195, 'O ADABAS no pedido do Vivocorp está de acordo com a Planilha de Adabás do PPVC?', 6),
(196, 'SWAP: Consta email com \"\"de acordo\"\" da área de Terminais?', 6),
(197, 'A INSCRIÇÃO ESTADUAL e SITUAÇÃO CADASTRAL esta de acordo entre Vivocorp e Sintegra?', 6),
(198, 'Cedente: As informações estão de acordo entre Vivocorp e Receita Federal?', 7),
(199, 'Cedente: A DOCUMENTAÇÃO DO CADASTRO está vigente?', 7),
(200, 'Cedente: Há DOCUMENTO PESSOAL com assinatura que permita validação da assinatura?', 7),
(201, 'Cedente: O NOME informado no campo Representante Legal no Termo TT é do representante legal?', 7),
(202, 'Cedente: O CNPJ informado no Termo de TT está conforme Vivocorp?', 7),
(203, 'Cedente: As linhas envolvidas na TT pertencem ao cedente informado?', 7),
(204, 'Cedente: O NOME/RG/ASSINATURA DO REPRESENTANTE LEGAL está igual entre doc pessoal e Termo de TT?', 7),
(205, 'Cedente: O REPRESENTANTE LEGAL que assinou o Termo de TT tem poderes para representar a empresa?', 7),
(206, 'Cedente: Consta no Termo de TT as assinaturas exigidas pelo cliente (individual ou em conjunto)?', 7),
(207, 'Cedente: A INSCRIÇÃO ESTADUAL/SITUAÇÃO CADASTRAL esta de acordo entre Vivocorp e Sintegra?', 7),
(208, 'Cessionário: As informações estão de acordo entre Vivocorp e Receita Federal?', 8),
(209, 'Cessionário: A INSCRIÇÃO ESTADUAL/SITUAÇÃO CADASTRAL esta de acordo entre Vivocorp e Sintegra?', 8),
(210, 'Cessionário: A DOCUMENTAÇÃO DO CADASTRO está vigente?', 8),
(211, 'Cessionário: Há DOCUMENTO PESSOAL com assinatura que permita validação da assinatura?', 8),
(212, 'Cessionário: O NOME informado no campo Representante Legal no Termo de TT é do representante legal?', 8),
(213, 'Cessionário: O CNPJ informado no Termo de TT está conforme Vivocorp?', 8),
(214, 'Cessionário: O NOME/RG/ASSINATURA DO REPRESENTANTE LEGAL está igual entre doc pessoal e Termo de TT?', 8),
(215, 'Cessionário: O REPRESENTANTE LEGAL que assinou o Termo de TT tem poderes para representar a empresa?', 8),
(216, 'Cessionário: Consta no Termo de TT as assinaturas exigidas pelo cliente (individual ou em conjunto)?', 8),
(217, 'A conta (de telefone) está anexada no Vivocorp?', 9),
(218, 'O Nº DA LINHA (Acesso Móvel) esta igual entre Termo de TT/Form.Complementar de TT e Vivocorp?', 9),
(219, 'O Nº da CONTA DE DESTINO esta igual entre Termo de TT/Form.Complementar de TT e Vivocorp?', 9),
(220, 'FALTA TERMO DE TT', 9),
(221, 'O Termo de TT está vigente?', 9),
(222, 'O PARCELAMENTO NOVO (DO APARELHO) esta com ação NOVA no Vivocorp?', 10),
(223, 'O DESCONTO PROMOCIONAL MENSAL ANTIGO esta com ação ATUALIZAR no Vivocorp?', 10),
(224, 'O DESCONTO PROMOCIONAL MENSAL NOVO esta com ação NOVA no Vivocorp?', 10),
(225, 'O PARCELAMENTO ANTIGO (DO APARELHO)  esta com ação ATUALIZAR no Vivocorp?', 10),
(226, 'A INSCRIÇÃO ESTADUAL e SITUAÇÃO CADASTRAL esta de acordo entre Vivocorp e Sintegra?', 10),
(227, 'A DOCUMENTAÇÃO DO CADASTRO está vigente?', 11),
(228, 'Há DOCUMENTO PESSOAL com assinatura que permita validação da assinatura?', 11),
(229, 'A  VALOR DA PARCELA DA COBRANÇA DO APARELHO é superior a R$ 10,00 (Dez Reais)?', 11),
(230, 'A DATA DE ASSINATURA do SMP é superior a 90 dias. Há \"\"de acordo\"\" executivo?', 11),
(231, 'A linha da troca possui o(s) serviço(s) obrigatório(s) informados na Tabela de Blindagem vigente?', 11),
(232, 'O NOME/RG/ASSINATURA REPRESENT LEGAL esta igual entre doc pessoal e Form.Complementar?', 11),
(233, 'FALTA TERMO DE TT', 11),
(234, 'Há no Form.Complementar as assinaturas exigidas pelo cliente (individual ou conjunto)?', 11),
(235, 'Consta no Form.Complementar a assinatura/nome/carimbo do Representante de Vendas?', 11),
(236, 'A DATA DE ASSINATURA do Form.Complementar está igual ou superior a data de assinatura do SMP?', 11),
(237, 'A  DATA (ASSINATURA) no Form.Complementar é superior a 90 dias. Consta na o \"\"de acordo\"\"?', 11),
(238, 'As linhas constam no Mailing de Troca?', 11),
(239, 'Os planos/serviços ausentes do SMP e constantes na linha  estão com ação ATUALIZAR no Vivocorp?', 11),
(240, 'O NOME/RG/ASSINATURA REPRESENTANTE LEGAL esta igual entre doc pessoal e Form.Complementar?', 11),
(241, 'A pessoa que assinou o Formulário Complementar tem poderes para responder pela empresa?', 11),
(242, 'Constam no Formulário Complementar as assinaturas exigidas pelo cliente (individual ou conjunto)?', 11),
(243, 'Consta no Formulário Complementar a assinatura/nome/carimbo do Representante de Vendas?', 11),
(244, 'O NÚMERO DAS LINHAS está igual entre SMP/formulário complementar e Vivocorp?', 11),
(245, 'Os planos/serviços no SMP estão com ação NOVA no Vivocorp?', 11),
(246, 'Os planos/serviços que serão substiuídos pelos constantes no SMP estão com ação EXCLUIR no Vivocorp?', 11),
(247, 'Os serviços constantes no SMP estão com ação NOVA  no Vivocorp?', 11),
(248, 'A(s) pessoa(s) que assinou(aram) o Form.Complementar tem poderes para responder pela empresa?', 11),
(249, 'As informações (vide Descrição) estão de acordo entre Vivocorp e Receita Federal?', 11),
(250, 'Consta no Contrato de Permanência as assinaturas exigidas pelo cliente (individual ou em conjunto)?', 11),
(251, 'A pessoa que assinou o Contrato de Permanência de Internet/Voz é representante legal da empresa?', 11),
(252, 'A DATA (DE ASSINATURA) no Contrato de Permanência de Internet/Voz está igual ou superior a do SMP?', 11),
(253, 'A INSCRIÇÃO ESTADUAL e SITUAÇÃO CADASTRAL esta de acordo entre Vivocorp e Sintegra?', 11),
(254, 'As informações estão de acordo entre Vivocorp e Receita Federal?', 11),
(255, 'O NOME/RG/ASSINATURA REPRESENT LEGAL esta igual entre doc pessoal e Termo de PN/Form.Complementar?', 11),
(256, 'Há no Termo de PN e Form.Complementar as assinaturas exigidas pelo cliente (individual ou conjunto)?', 11),
(257, 'A(s) pessoa(s) que assinou(aram) o Termo PN e Form.Complementar de PN tem poderes para responder?', 11),
(258, 'Consta no Form.Complementar de PN a assinatura/nome/carimbo do Representante de Vendas?', 11),
(259, 'A DATA DE ASSINATURA do Form.Complementar de PN está igual ou superior a data de assinatura do SMP?', 11),
(260, 'A  DATA (ASSINATURA) no Form.Complementar de PN é superior a 90 dias. Consta na o \"\"de acordo\"\"?', 11),
(261, 'A DATA DE ASSINATURA do SMP é superior a 90 dias. Há \"\"de acordo\"\"executivo?', 11),
(262, 'Os planos/serviços constantes no SMP estão com ação NOVA  no Vivocorp?', 11),
(263, 'O DESCONTO PROMOCIONAL MENSAL ANTIGO esta com ação ATUALIZAR no Vivocorp?', 11),
(264, 'O DESCONTO PROMOCIONAL MENSAL NOVO esta com ação NOVA no Vivocorp?', 11),
(265, 'O PARCELAMENTO ANTIGO (DO APARELHO)  esta com ação ATUALIZAR no Vivocorp?', 11),
(266, 'O PARCELAMENTO NOVO (DO APARELHO) esta com ação NOVA no Vivocorp?', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perfil` int(255) DEFAULT NULL,
  `turno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statususer` int(11) DEFAULT NULL,
  `primeiro_acesso` int(11) DEFAULT NULL,
  `recuperacao` int(11) DEFAULT NULL,
  `cnpj_cpf` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `nome`, `email`, `password`, `perfil`, `turno`, `statususer`, `primeiro_acesso`, `recuperacao`, `cnpj_cpf`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1231915', 'SAULO DE ASSIS RUAS FERNANDES', 'saulo.fernandes.ext@telefonica.com', '$2y$10$z0aYSVspyThRurGnpClJxuUsJdHHlzQ51Lr7ritPuLGzCqPl4xo1y', 1, NULL, 1, 2, 2, '985.918.860-20', NULL, '2018-08-13 00:28:16', '2018-09-19 13:44:12'),
(2, '80000', 'PARCEIRO', 'assisruas0495@gmail.com', '$2y$10$xdm2hKASqc/yKXzxToRVU.dxnF6er5C84zLdwEhFbOyBMwOi0vTRS', 5, NULL, 1, 2, 2, NULL, NULL, '2018-08-13 00:29:30', '2018-09-03 16:12:32'),
(6, '1231917', 'OPERADOR CONTESTAÇÃO', 'saulodeassisruasfernandes@gmail.com', '$2y$10$DyeJ.MNgGVxnDpA6KfDUCuWWWpFlBd6JByq9DWuBd5949fuNhGbiG', 6, NULL, 1, 2, NULL, '87.945.612/0001-23', NULL, '2018-08-20 00:56:28', '2018-08-20 00:59:42'),
(7, 'A0014209', 'LEANDRO  ZANUZ GONCALVES', 'leandro.zanuz@telefonica.com', '$2y$10$dh59NE9wjgTuwP56a0RyRuFMLxO2WLc.opqGvf7vISXWOdjJnWYBW', 3, NULL, 1, 1, NULL, '001.235.260-86', NULL, '2018-08-22 22:38:52', '2018-08-22 22:38:52'),
(8, 'A0066495', 'RODRIGO ZOLIM', 'rodrigo.zolim@telefonica.com', '$2y$10$VbWoL4JOGfGyrUV8uVm2VO.nfQ7UiagHPIwFfmM6P3dOxzcGsycpC', 4, NULL, 1, 1, NULL, '806.177.190-04', NULL, '2018-08-27 19:38:45', '2018-08-27 19:38:45'),
(10, '1231916', 'SUPERVISOR', 'saulo.fernandes@atento.com.br', '$2y$10$WiaSfjoEaV1p9VbiGPjVGuwVA0dIKkXjjHobA5Pri5b9jYnBaMvpe', 7, NULL, 1, 2, 2, '985.918.860-20', NULL, '2018-08-28 16:42:22', '2018-09-18 17:46:55'),
(16, '90000', 'TESTE', 'teste@teste.com', '$2y$10$CyDDnqA3su5TE4NsZwEId.o5j/nSU6UD8RJAEsP7RaGBsKCvuw2s6', 5, NULL, 1, 1, NULL, '98.456.987/0001-10', NULL, '2018-08-28 19:15:17', '2018-08-28 19:15:17'),
(17, 'A5111259', 'TESTE', 'teste2@telefonica.com', '$2y$10$B5rb7yNvMhN0dcsdscIK2uB65WsYq98CBSkLJxAGUuZOIwMHpG8/q', 4, NULL, 1, 2, NULL, '985.918.860-21', NULL, '2018-08-28 20:03:32', '2018-09-21 21:00:48');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contestacoes`
--
ALTER TABLE `contestacoes`
  ADD CONSTRAINT `id_parc` FOREIGN KEY (`id_parc`) REFERENCES `parceiros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
