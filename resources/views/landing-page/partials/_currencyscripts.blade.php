<script src="{{ asset('js/app.js') }}"></script>

<script>
      const currencyFormat = (amount) => {
        const DEFAULT_CURRENCY = JSON.parse(@json(json_encode(Currency::getDefaultCurrency(true))))
         const noOfDecimal = 2
         const currencyPosition = DEFAULT_CURRENCY.defaultPosition
         const currencySymbol = DEFAULT_CURRENCY.defaultCurrency.symbol
        return formatCurrency(amount, noOfDecimal, currencyPosition, currencySymbol)
      }
      window.currencyFormat = currencyFormat
      window.defaultCurrencySymbol = @json(Currency::defaultSymbol())

    </script>



