<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\BusinessOnBehalf\Business;

use Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser\CompanyUserReader;
use Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser\CompanyUserReaderInterface;
use Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser\CompanyUserWriter;
use Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser\CompanyUserWriterInterface;
use Spryker\Zed\BusinessOnBehalf\Business\Model\Customer\CustomerExpander;
use Spryker\Zed\BusinessOnBehalf\Business\Model\Customer\CustomerExpanderInterface;
use Spryker\Zed\BusinessOnBehalf\Business\Model\Customer\CustomerHydrator;
use Spryker\Zed\BusinessOnBehalf\Business\Model\Customer\CustomerHydratorInterface;
use Spryker\Zed\BusinessOnBehalf\BusinessOnBehalfDependencyProvider;
use Spryker\Zed\BusinessOnBehalf\Dependency\Facade\BusinessOnBehalfToCompanyUserFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Spryker\Zed\BusinessOnBehalf\Persistence\BusinessOnBehalfRepositoryInterface getRepository()
 * @method \Spryker\Zed\BusinessOnBehalf\Persistence\BusinessOnBehalfEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\BusinessOnBehalf\BusinessOnBehalfConfig getConfig()
 */
class BusinessOnBehalfBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\BusinessOnBehalf\Business\Model\Customer\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getRepository());
    }

    /**
     * @return \Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser\CompanyUserReaderInterface
     */
    public function createCompanyUserReader(): CompanyUserReaderInterface
    {
        return new CompanyUserReader(
            $this->getRepository(),
            $this->getCompanyUserFacade(),
        );
    }

    /**
     * @return \Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser\CompanyUserWriterInterface
     */
    public function createCompanyUserWriter(): CompanyUserWriterInterface
    {
        return new CompanyUserWriter(
            $this->getEntityManager(),
        );
    }

    /**
     * @return \Spryker\Zed\BusinessOnBehalf\Business\Model\Customer\CustomerHydratorInterface
     */
    public function createCustomerHydrator(): CustomerHydratorInterface
    {
        return new CustomerHydrator(
            $this->getRepository(),
            $this->getCompanyUserFacade(),
        );
    }

    /**
     * @return \Spryker\Zed\BusinessOnBehalf\Dependency\Facade\BusinessOnBehalfToCompanyUserFacadeInterface
     */
    public function getCompanyUserFacade(): BusinessOnBehalfToCompanyUserFacadeInterface
    {
        return $this->getProvidedDependency(BusinessOnBehalfDependencyProvider::FACADE_COMPANY_USER);
    }
}
