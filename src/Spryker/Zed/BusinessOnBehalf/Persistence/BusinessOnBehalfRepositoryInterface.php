<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\BusinessOnBehalf\Persistence;

use Generated\Shared\Transfer\CompanyUserTransfer;

interface BusinessOnBehalfRepositoryInterface
{
    public function isOnBehalfByCustomerId(int $idCustomer): bool;

    /**
     * @param int $idCustomer
     *
     * @return array<int>
     */
    public function findActiveCompanyUserIdsByCustomerId(int $idCustomer): array;

    public function findDefaultCompanyUserByCustomerId(int $idCustomer): ?CompanyUserTransfer;
}
