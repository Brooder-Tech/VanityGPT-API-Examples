// Success is a true or false.  If it fails ( False ) check the message string for information
// 
interface WalletData {
    success: boolean
    data: {
        publicKey: string
        privateKey: string
    }
    message: string
}


// This GET URL uses the paramaeters Letters for the letters to be used.
// The method for the address type is START, but can also be END or BOTH

function getVanityWalletData(): Promise {
	return fetch('https://api.vanityGPT.com/create-address/?letters=AA&method=START', {
		method: 'GET',
		headers: {
			'x-api-key': 'your_api_key',
		},
	})
		.then((response) =&gt; response.json()) // Parse the response in JSON
		.then((response) =&gt; {
			return response as WalletData; // Cast the response type to our interface
		});
}
