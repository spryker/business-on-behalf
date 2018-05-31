<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\BusinessOnBehalf\Business;

use Generated\Shared\Transfer\CompanyUserCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface BusinessOnBehalfFacadeInterface
{
    /**
     * Specification:
     * - Sets IsOnBehalf property as true when the provided customer has multiple company users connected.
     * - Sets IsOnBehalf property as false otherwise.
     * - Uses provided customer ID to find company users.
     * - Ignores Company user/Customer activity flags.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithIsOnBehalf(CustomerTransfer $customerTransfer): CustomerTransfer;

    /**
     * Specification:
     * - Retrieves a collection of active company users related to the provided customer.
     * - Uses customer ID to find company users.
     * - Hydrates company transfer to company user transfer.
     * - Hydrates company business unit transfer to company user transfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserCollectionTransfer
     */
    public function findActiveCompanyUsersByCustomerId(CustomerTransfer $customerTransfer): CompanyUserCollectionTransfer;
}
