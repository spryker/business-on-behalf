<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\BusinessOnBehalf\Zed;

use Generated\Shared\Transfer\CompanyUserCollectionTransfer;
use Generated\Shared\Transfer\CompanyUserResponseTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\BusinessOnBehalf\Dependency\Client\BusinessOnBehalfToZedRequestClientInterface;

class BusinessOnBehalfStub implements BusinessOnBehalfStubInterface
{
    /**
     * @var \Spryker\Client\BusinessOnBehalf\Dependency\Client\BusinessOnBehalfToZedRequestClientInterface
     */
    protected $zedRequestClient;

    public function __construct(BusinessOnBehalfToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    public function findActiveCompanyUsersByCustomerId(CustomerTransfer $customerTransfer): CompanyUserCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyUserCollectionTransfer $companyUserCollection */
        $companyUserCollection = $this->zedRequestClient->call(
            '/business-on-behalf/gateway/find-active-company-users-by-customer-id',
            $customerTransfer,
        );

        return $companyUserCollection;
    }

    public function setDefaultCompanyUser(CompanyUserTransfer $companyUserTransfer): CompanyUserResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyUserResponseTransfer $companyUserResponseTransfer */
        $companyUserResponseTransfer = $this->zedRequestClient->call(
            '/business-on-behalf/gateway/set-default-company-user',
            $companyUserTransfer,
        );

        return $companyUserResponseTransfer;
    }

    public function unsetDefaultCompanyUser(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $this->zedRequestClient->call(
            '/business-on-behalf/gateway/unset-default-company-user',
            $customerTransfer,
        );

        return $customerTransfer;
    }
}
