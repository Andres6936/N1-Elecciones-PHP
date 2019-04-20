### Tabla Candidatos

```sql
create table Candidatos
(
  ID_CAND   int auto_increment
    primary key,
  NOM_CAND  varchar(45) not null,
  APEL_CAND varchar(45) not null,
  PART_CAND varchar(45) null,
  EDAD_CAND int         null,
  COST_CAND double      null,
  VOTO_CAND int         null
);
```

### Tabla Votantes

```sql
create table Votantes
(
  ID_VOTA   int auto_increment
    primary key,
  NOM_VOTA  varchar(45) null,
  APEL_VOTA varchar(45) null,
  ID_CAND   int         null
)
```

### Campos Candidatos

```sql
insert into Candidatos values (1, 'Felipe', 'Pitty', 27, 'Independiente', 0, 0);
insert into Candidatos values (2, 'Susanita', 'Chirusi', 26, 'Revolucionario', 0, 0);
insert into Candidatos values (3, 'Monolito', 'Goreiro', 31, 'Tradicional', 0, 0);
```
