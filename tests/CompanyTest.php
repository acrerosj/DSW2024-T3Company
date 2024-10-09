<?php

use Dsw\Company\Company;
use Dsw\Company\Employee;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{

  public function testCompanyAddEmployee() 
  {
    $company = new Company();

    $this->assertCount(0, $company->getEmployees());

    $employee1 = new Employee("Pedro", 34, 3000);
    $company->addEmployee($employee1);
    $this->assertCount(1, $company->getEmployees());
    $this->assertSame($employee1, $company->getEmployees()[0]);
    
    $employee2 = new Employee('Dylan', 20, 1450);
    $company->addEmployee($employee2);
    $this->assertCount(2, $company->getEmployees());
    $this->assertSame($employee2, $company->getEmployees()[1]);
  }

  public function testCompanyRemoveEmployee() {
    $company = new Company();
    $company->addEmployee( new Employee("Pedro", 34, 3000) );
    $dylan = new Employee("Dylan", 20, 5000);
    $company->addEmployee( $dylan );
    $this->assertCount(2, $company->getEmployees());
    $this->assertContains($dylan, $company->getEmployees());
    $company->removeEmployee($dylan);
     $this->assertNotContains($dylan, $company->getEmployees(), "Dylan no debería estar en la compañia");
    $this->assertCount(1, $company->getEmployees());
  }

  public function testCompanyCalculateTotalSalary() {
    $company = new Company();
    $this->assertEquals(0, $company->calculateTotalSalary(), 'Error al calcular el salario total');
    $company->addEmployee( new Employee("Pedro", 34, 3000) );
    $company->addEmployee(  new Employee("Dylan", 20, 5000));
    $this->assertEquals(8000, $company->calculateTotalSalary(), 'Error al calcular el salario total');
  }
}