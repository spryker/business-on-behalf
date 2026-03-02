<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\BusinessOnBehalf\Business\Model\CompanyUser;

use Generated\Shared\Transfer\CompanyUserResponseTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\BusinessOnBehalf\Persistence\BusinessOnBehalfEntityManagerInterface;

class CompanyUserWriter implements CompanyUserWriterInterface
{
    /**
     * @var \Spryker\Zed\BusinessOnBehalf\Persistence\BusinessOnBehalfEntityManagerInterface
     */
    protected $entityManager;

    public function __construct(BusinessOnBehalfEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setDefaultCompanyUser(CompanyUserTransfer $companyUserTransfer): CompanyUserResponseTransfer
    {
        $result = new CompanyUserResponseTransfer();
        $selectedCompanyUser = $this->entityManager->setDefaultCompanyUser($companyUserTransfer);
        if (!$selectedCompanyUser) {
            return $result;
        }
        $result->setCompanyUser($selectedCompanyUser);

        return $result;
    }

    public function unsetDefaultCompanyUserByCustomer(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $customerTransfer = $this->entityManager->unsetDefaultCompanyUserByCustomer($customerTransfer);

        return $customerTransfer;
    }
}
