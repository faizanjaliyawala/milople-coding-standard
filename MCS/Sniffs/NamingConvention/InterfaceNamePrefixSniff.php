<?php
/**
 * Checks that interfaces are prefixed by Mi.
 *
 * @author  Faizan Jaliyawala <faizanjaliyawala47@gmail.com>
 * @link    https://github.com/faizanjaliyawala/milople-coding-standard
 */
namespace FaizanJaliyawala\MCS\Sniffs\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class InterfaceNamePrefixSniff implements Sniff
{
    /**
     * Registers the tokens that this sniff wants to listen for.
     *
     * @return int[]
     */
    public function register()
    {
        return [T_INTERFACE];
    }

    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The file being scanned.
     * @param int                         $stackPtr  The position of the current token
     *                                               in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $interfaceName = $phpcsFile->getDeclarationName($stackPtr);
        if ($interfaceName === null) {
            return;
        }

        if (substr($interfaceName, 0, 2) !== 'Mi') {
            $phpcsFile->addError(
                'Interface names must be prefixed with "Mi"; found "%s"',
                $stackPtr,
                'WrongInterfaceName',
                [$interfaceName]
            );
        }
    }
}
