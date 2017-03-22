CREATE TABLE HomeState
(
StateAbb char(2) NOT NULL,
StateName varchar(40) NOT NULL,
LastUpdatedBy varchar(20),
LastUpdated date,
PRIMARY KEY (StateAbb)
);

CREATE TABLE Country
(
CountryAbb char(2) NOT NULL,
CountryName varchar(40) NOT NULL,
LastUpdatedBy varchar(20),
LastUpdated date,
PRIMARY KEY (CountryAbb)
);

CREATE TABLE Driver
(
DriverID integer NOT NULL,
FirstName varchar(20) NOT NULL,
LastName varchar(20) NOT NULL,
MiddleInitial char(1),
HouseNumber integer,
Street varchar(50),
CityCounty varchar(40),
StateAbb char(2)
    references HomeState(StateAbb),
CountryAbb char(2)
    references Country(CountryAbb),
ZipCode char(5),
DateOfBirth date,
CDL varchar(40),
CDLDate date,
LastUpdatedBy varchar(20),
LastUpdated date,
PRIMARY KEY (DriverID)
);


CREATE TABLE Equipment
(
ID int NOT NULL,
VinNumber varchar(40) NOT NULL,
Make varchar(35),
Model varchar(30),
EquipmentYear integer,
priceAcquired Decimal(8,2),
LicenseNumber varchar(10),
DriverID integer
    references Driver(DriverID),
LastUpdatedBy varchar(20),
LastUpdated date,
PRIMARY KEY (ID)
);

CREATE TABLE Contractor
(
ContractorID integer NOT NULL,
FirstName varchar(20) NOT NULL,
LastName varchar(20) NOT NULL,
MiddleInitial char(1),
HouseNumber integer,
Street varchar(50),
CityCounty varchar(40),
StateAbb char(2)
    references HomeState(StateAbb),
CountryAbb char(2)
    references Country(CountryAbb),
ZipCode char(5),
Fee Decimal(8,2),
LastUpdatedBy varchar(20),
LastUpdated date,
PRIMARY KEY (ContractorID)
);


CREATE TABLE DriverContractor
(
ContractorID integer NOT NULL
    references Contractor(ContractorID),
DriverID integer NOT NULL
    references Driver(DriverID),
HireDate date,
TermindationDate date,
Salary decimal(10,2),
LastUpdatedBy varchar(20),
LastUpdated date,
PRIMARY KEY (DriverID, ContractorID)
);

