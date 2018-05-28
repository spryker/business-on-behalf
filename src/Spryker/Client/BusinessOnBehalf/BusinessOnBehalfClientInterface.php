<?php

namespace Spryker\Client\BusinessOnBehalf;

use Generated\Shared\Transfer\CustomerTransfer;

interface BusinessOnBehalfClientInterface
{

    /**
     * Specification:
     *
     * - Retrieves a collection of active company users related to the provided customer.
     * - Uses customer ID to find company users.
     * - Hydrates company transfer to company user transfer.
     * - Hydrates company business unit transfer to company user transfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer[]
     */
    public function findActiveCompanyUsersByCustomerId(CustomerTransfer $customerTransfer): array;
}
