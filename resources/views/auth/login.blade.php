<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: rgb(233, 233, 233);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .logincontainer {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #42A5F5;
            text-align: center;
            width: 350px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 30px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background: white;
        }
        .forgot-password {
            display: block;
            text-align: right;
            margin: 5px 40px;
            font-size: 14px;
            color: #42A5F5;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .login-button {
            width: 92%;
            padding: 12px;
            background-color: #42A5F5;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 25px;
            cursor: pointer;
            margin: 15px 0;
        }
        .login-button:hover {
            background-color: #1090f8;
            transition-duration: 150ms;
        }
        .social-buttons {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .social-button {
            width: 48%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .google {
            background-color: white;
            color: #42A5F5;
        }

        .google:hover {
            background-color: #f0f0f0;
            transition-duration: 150ms;
        }
        .facebook:hover {
            background-color: #f0f0f0;
            transition-duration: 150ms;
        }
        .facebook {
            background-color: white;
            color: #42A5F5;
        }
        .social-button img {
            width: 20px;
            margin-right: 10px;
        }
        .register {
            font-size: 14px;
            margin-top: 10px;
        }
        .register a {
            color:#42A5F5;
            text-decoration: none;
            font-weight: bold;
        }
        .register a:hover {
            text-decoration: underline;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    
</head>
<body>
    <div class="logincontainer">
        {{--<img src="/images/logo4.jpg" alt="logo-travelconneckt" class="h-8 w-8">--}}
        <h2 class="text-gray-400 px-20">Login</h2>
        <form action="{{ route('login_post') }}" method="POST">
            @csrf
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="password" name="password" placeholder="Your Password" required>
        <a href="#" class="forgot-password">Forgot Password?</a>
        <button class="login-button">Login</button>
        </form>
        <div class="social-buttons">
            <a href="{{ route('auth.google') }}" class="social-button google">
                <img src="/images/google.png" alt="Google"> Google
            </a>
            <button class="social-button facebook">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAMAAzAMBEQACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAAAQIDBAcFBgj/xABIEAABAwIDBAYFCAcFCQAAAAABAAIDBBEFEyEGEjFRIjJBYXGBB1KRodEUM0JigrGywSM2cnN0krMVJEOiwhY1RFNUZIPh8P/EABoBAQACAwEAAAAAAAAAAAAAAAABBQIEBgP/xAAzEQEAAgECBAMFBwUBAQAAAAAAAQIDBBEFEiExQVFhEzIzcbEUFTRCUoGRIiOh0fDxQ//aAAwDAQACEQMRAD8A2nKdzCBzTlCx17dECmRrhujidEDMk+sEDw8M6JugC4S9EIGZJQPErQLG9wgR36XUaWQJlOHaEDs5vega5plO83ggAxzDvHgOSB2cD2FA0sLzvAjVAC8Wrtb8kDs0ckDMp3MIHNOVodb8kCmQP6NjrogblO5hAoeIxulAOcJBut496BuU7gSEDxI1uhB0QGc3vQSoIKjrBAyPrt8UFkIK8vXKBYPnPJBOgqu6xQSwcHIJH9UoKqCxD1PNAsvUKCsOAQWo+oPBAyfgPFBAguIIJ+IQMZ12+KC0grS/OFAsHX8kFhBUd1igRAtygmi1brqgc8dA25IK9zbifagnjALQgJtG3HG6CC7tbuJCCy0CwQRzG1rd6Dh4htNhOHEsqKsPkH+HF03e7gtvDoc+b3a9PVr5NTip3nr6OBWekTi2hw4Adj53/wCkfFWGPg0//S/8NS3EP01cmo25xeU3bLBD3RxX+8rarwnBHeJn93jOuzT6IP8AbHGCbmvf5RtH5L0+7NP+n6/7Y/a8v6k0W2uKNOtaT4wMKwtwzBP5fqyjV5PN0KbbmqJAlbSy+Toyfv8AuWvfhNPDeP8AL2rrbePV36Da6jkP96ilg+sP0jR5jX3LRy8OyU61nds11VZ7w9BTVdLVxZlNNHK3mw3WjelqdLRs2K3rb3ZNJPNYsk0OoN/egc8AMPDhyQV7lBPELsF0BMLM05oILlBZaOiNEC2HJBFk96AJytBqgTML+ja10C5I5oEzMs7oHDtQG9m9A6IFyQPpIOFj21lBgpMTnZ9X2U8ZuR+0ez71uaXQ5dRPTpDXzammLv3Z5jW1OKYs4tkmyYOyGE2HmeJXQabh+HB1iN585VWXVZMvpDib5tot3bwa/qaSeakCAQKgLoHxTSRO3mOLT3FYzWs+DKLTDqUGOTU8m+64d/zIzuu93Fa+TS1vGz2rnmO72mDbVtkAFSTPGOMjBZ7f2m9o8FSajh3L1p09Fhi1W8f1dYespqiKSBstPK2WN4uHtOiq7Vms8to2luVtFo3hKJN4httCoSMnvQJv5Z3eKBQ7N6J07UBkjmgM0jS3BAmceSCXeb6w9qCKbpEbov4IGNBDgSCBfkgsBzeYQQSAl5IBI7kCxXa+5BGnJB4Ta/bjde+gwOQFwu2SpGoaeTfirrQ8M5o9pmjp5K/U6zl/po8A4uc5znuJc43cSbkldBEbRER2VU9Z6kQCBECoFCBbIDdQFkCIHxSvhkD43FrhwINljasWjaUxM1neHqNn9oZIZesGSuPSB6kviOw96rdVo4tH/dG7h1ExPfafq0PC6+Kvj349HsIEjCdWH4d657NhtinaVpTJF46Olvt9Ye1eTNDKCX3AJHcgIui+7gQLdqCbeb6w9qCu5rt49E+xAm671XexAnkgsQ9VA5/VPggqjq8OKCxFYRjigzv0gbWF7pMHwyQj6NTK0+1g/NXvDNBE7ZssfKFfq9TtHJV4MNAGivlUVQBAiAUhyJX8MwmuxMn5DTvkA0c61mjzWvm1WHD78s8eG+T3Yegg2DrXNBnqqeM24auVfbjGL8tZltV0F57ylOwVRbSvg/kcsfvinjWWX3fb9SrUbE4pG0mJ0EwGuj7Er1pxfBM7TvDytoskR06vLvBB1FlaRO7UMQKNNRxQei2dxqSGeNr37sjRuxuP0h6juYVdq9LW1W5gy7T6tLw+tjr6cTRC1tHMPFp5LmsuKcV9pW2O8Wru6MPUXmzE/U80FftCC03qhA5BHktQNeTFYN4IGh5eQ13AoH5TeSDy23m0b8Ew8U1I8CtqejGeJjb2u+HerDh2j+05N7e7Hdr6nN7OnqyiNgYO0ntJN7rqlHM79ZOUoCgCBEASBxKkh39kMB/tuoM04cKKI2fY2L3eqPzVfr9b9nry096f8NzTaf2k727NOghjp4WRQRtjjYLNa0WAHguYta1rTaZ6resRWNoPWKQgUdgQ6sVn+cf4ldtT3Yc3PdCsgIFBIdcIPY7KY66GYPkcSQN2dnrs9Yd4+5VGu0kWjaP2/wBLDTZp338fH5NIbKN1piILCLgjtXOdu61jr1Oa4yHddwQPyWoIzI4Gw7EBmuQSZrOaBrxmEFvBA0MLSHO4AoHS1EUUT5HvAYxpc4nsAUxEzO0E9mGY1iz8cxefEH33HHdhB+iwcPj5rsdJg+z4op4+Ki1OX2mT0VVsNcIBAiAJspSp1k+WxzuQUx5yzrXdtWzeHtwvBKSkAAe2MGS3a46n3rjNTlnLmtaV7jrFaREOkvBmPBAEgdo81G4QPaCOm0eJWURKJli8xBkeQdLldrT3Yc7bvKIrJBEAgmo6h1NUMlZ9E6jmsclOeswzrbltu1PZCvFVTGlBvuDfiv6h7PI6Ll9fh5L83/brjT5N45f+2ejY0xu3n6BV7aPzWX4oIzG4kkDQ96Ayn8vegZqgmg6vmgdJox3gg8R6TcUdQ4A2kiNpq9+Vx4RgXcfuH2lZ8Kwe11G89oa2qvyY2aMaGiw4BdRPdSHKEBAiAKkMeVLKHPvmYpQwWu2SqhaR3F4BWGadsNp9J+jbwVibRu+gxyXEeK3CChj1ecLwarrWt3nQxksae13AD2r302Gc2atI8WGS/JWbMUrsQxjEagzVWI1BcTwZIWgdwA7F1+PTYMddq1hV2zzbrudSNna676qpcfrTvP5rKaY/0x/DxvmtMbbrXcpa5FCQgEAg9NsjinyKpikcdIX9P927R3s4+Srtfg9pWYjx+rc02Tl29Gry9TiuVXKLsUiy3qhAqBNxvJBFL0LBugKBrXEuAJ0KDKPSXV/Ktqm0zTdlJAG2+s7U/kum4Pj5cE285Vevv1irzgVorggECIBSlFL1VMMoU8O12kwoHh8th/GF5ar8Pf5T9G7gjrD6BC4paBBxNtW72zVWO9n4gt7hv4mrW1c/2bMsMWvBdVupJkoZuoglkCIkIBAKRaw14ZUta7qv6J89F5ZY3r8npSerYtnKg1mE0sjyXHL3XX5t0/JcjqsfJmtC8w25qRLqZbOS13qhc91yL6BAm87mglzhyKBCM7pDQd6BBGW9IkGyDCsaqPle0mK1AJs6pcB5afkuy0VeTTUj0UeqnfLKALYawQCBCVKS0ZjmxOjpXk2nmbGd06i5XnmvOPFa8d4euLHN7RDRnbBYO4Wzqz+dvwXPffGfyhZfYcaOl9HeC0+IU9a2StdJTyNkY18jd0uBuLgN5rHJxXPkpNJ26vWmnpTs9aNNFWvcIIK+jhxCjkpaney5Brumx5r0xZbYrxeveGGTHGSvLLhHYnCr/O1X87fgt/721HlDU+wYlbEtjsLpsPqqhs1VeGF0gu9trgX5L1w8Tz3yVrO3WYY5NFjpSZiWfv4ldBCqNRIQCAQOYd17XciCkxvGyYnaWrbCVG9hkzSbiOY2A+sAVy3E67Zot5wudHO9J+b02cORVc2zcok3uNUBknmEEaCan0afFA6U2ieeQKD55jO9UVT/AFp5D/mK7jFG2KvyhQZ/iSmWTxCBCVKUUjtCphlWFXCH721WFD/umfetfWfBv8m9p42mG/rjVmEAgEAgEHH2vmyNm60+uGx+1wB911u8Przaqvp1/hray3Lgsyt3Erq1JJiAQIgVAo4pPYaR6On3pa1v1mH3LneLx/VWfmtdBPSf2evt3KnWCyzqjwQOQJYcgghmNndvDsQRtG8bXJugwGMFtTWNOm7USD/MV2+Kd8VflCgz/ElMs3iCgaeClKvMeiVMM6quCkDavDHOIAFSy5PitbWfBv8AJvYO8PoHNj9dvtXHLIZjPXb7UDkAgDpx0UhuYz12+1Nh5j0g1LW4PBC17S584cRfsa0/EK04TSZzTbyhocQt/biGdldGqjUAgRAqBQLmyDSPRkLx1xt9Jo9y57jE/wBVf3Wug7We5t3KmWCqSb8baoE+0UEuceQQK0ZupNvBAuWGdK501QYNjEJpdpcVpiLbtQ4jwOq7HRW59PSVJq42yShWy1QUSaVIglFwVLOrl1FK90u80kHx4KJjf5Nil9kTmVY/4qoH/md8V5+yr5f4evtfVY2fqKqPaPCr1VQf75ECDM4ggvAtxWvqcdIw36eE/R7UtMzD6K71yTdKg876QjKNkK/Ie+N53BvMdYi7h2re4dWLaqkW7PLPblxzLG44Kskb9ZUkfv3/ABXWclP0x/CsnPPm6kTXNjs6R7zze4u+9Y8tfCGre027ycjEIBAIBAreKDUfR1EYsFln3dZJj7hZczxa39+K+ULjQR/a385eqzjyCq26cIr63OqAyR6xQRbjuRQSREMBDtDdA9zgWkA6oMd9JdG6j2sjqSLNrIAQebm6H8l0vB8nNimnlKs11PzOAOCtVaCiTSpDHNRMI3RgqWW6KVluxGUSp4W220uFW/62H+o1a+q+Df5T9G7hnrD6L7FxqxIg4m2w3tmasd7PxBb3DfxVWtrPgyyrc1Oi6vdSzJVCAgEAgEAgew2N7XtqhM7Nn2cpPkWAUVPbpiMOd4nX81xuqye0zWsv8FOTHFV/cdyK13sna9oAF+AQLvt5oFQQz8UEbesOHFB5L0s4Q6t2dZXQtvPh0mdoLkxkWePuP2VZcLz+yz7ebX1FOfGzCGQPjDgbiy6mVHJ6hBCFKSFA0hE7oZVLOqhhn6y4V/Gw/wBRq8NV8G/yn6N3D3h9Fdi4xZEQcbbP9W6v7H4gt7hv4mrW1nwbMscF1SjMRIQCAQCAQdXZrDzimM0tMRePe35e5jdT7eHmtXW5vY4bW/aHtp8ftMkVbND1+FhZcev0/Ygqu4nggT2IH5r+fuQPjAkBL9SEDnMaxpc0ahBBNaaJ8UwDmPaWuFuItqpiZid4JYTimGP2fxqpwyT5trt6B3rRnh8F2Gj1EajDFo7qXVYuS28GLZagKBLKUmlEoJlMMqqOG/rLhX8bD/UC8NV8G/yn6N7D3h9E9i4xZEQcbbL9W6v7H4gt7h34mrW1nwZZa7iV1UKMwokiAQCAQKpGmejbBfk+HvxGobaWqsGA8RGOHtK5niup9pkjHHaPqt9Dhmtee3eXsXgRtuzQqqbyPMfbj7kEojY4XI4jmgMpnL3oI8p6BzDlCzuJKBxeHgtHEhBHlPQeT9IuzRxvCRPRtH9p0YL4gP8AEb2s8+zvW/w/VfZ8sRPuy8c+KMlWU0s2bGNC1w0LToQeS6zeJ6worVms7JkYgokx3BEwgmUsqqOG/rLhX8bD/UavDVfBv8p+jew94fRPYuMWREHG2z/Vur+x+ILe4b+Jq1tZ8GzLHHVdVCjMRIQCAQCDs7J4I/HcUbFun5LFZ07+y3Y0d5/+79LX6qunxes9mzpcM5b+kNjiDIGNjA3Q0WDRwAXJzO87yvI6HPdmDdbxUCPKcglEjRpyQGa1A9BDP1x4IGM648UFlBWl6514KJGaekLZKSKSXHcIiLvpVcDBx5vA+/2q94br4rtiyT08GnqtPzxvDxcEzZmBzCCr9UTWY7pCiDXcEShmUsocoTmkxSlq2t3siZku7z3XA29y8s1JvSaecTDdxTt1aEPS3Fb/AHRLfulCo/ue2/vw2/tEeRw9LMR4YPLf96Ejg9/1wTqIgmJbbuxzC5aUYcadshF3ukB4G/BbWl4ZOHLF5tvs09Tqq3ryQ84TfhwVrHZXkQCAQCC1hOHVOL17KKjYXSO1c7sY3mV46jPTBjm9/wD164cVsttobPgWEU+C4fHSUw4avfbV7u0lcjqM9s+Sb2XuPHGOvLC1N84vFmIev5IJ0FU8T4oBAbzvWPtQTQ9IHe18UDpGtDCQACEEG8eZQTxgFoJAugbKAB0W69ygZntjsG7MkxPZ1gDzd0tG3QHmWcj3K60PE+TamXt5tTUaaLxvHd4SGpDy5j2lkjXFrmOFi0jiCCuhrMWjesqm+OaTtKUqWCN4ujLdWkpw917KXpF9jfkjb8AiedJHStBvZN2M3XGN3W2US85nc9QxCAQIXAcTZSl0MCwWux6ryaJlomn9LO4dFnxPctTVavHpq72nr5PfDp7ZZ9GuYFgVFgNAYKVt3O1kld1nnv8AguW1Opvnvz38Oy5x4q467VXbk9p9q8HoniAc27hc96BJQGsu0WN+xBDvO9Y+1BZa1paLgcOSBd1vqj2IIck8wgUHK04njogMzf6NrXQJknmEC5mX0bEoELs3o2KAyjz1QeZ2p2NwraEmZ7DTV4FhVQ6F37Q+l5rd0uuzaftO8eTyyYa5I6s1xnZrHMCu6opzVUw4T04LhbvHEK/03EcObpM7T6q7Lo7R1q5MVRFL1Xgqw79mnNZjukAChBwaOSBwFkQcoQCgQuaBqbKQlOJqybIooJKiY/RjaSf/AEsMmSmOOa87PWmK152h7fAPR3POWz4/JuM4/Jonan9p3Z5Kl1XGPy4Y/dv4dDEdbtCo6amw6mjp6WCOKFo6LI22AVHe9r25rzvKwrWKxtWNoS5jX9EA66LFIyTzCBd8RdAi5QG/m9EC3agTJPMIFzQ3Sx0QGf8AVKCW45oIZ9SLIGMvvt8UFkEc0FeTV5QLDpJryQT3HNBWcDvHRA+EaODuB5oODjWxWz+MF0tTRNinOpmpzlvPjbj53W1h1ufD7tnnbFS/eHkKz0Xzx9LCsYLuUdXF/qb8FZY+NTHv0/hrX0VJ7OXLsHtTF1IaSo745w2/81lt14xp577w17aG3gru2S2pZo7Cif2ZWn816xxPS+bH7DkOj2O2qkNhhjWDm+dg/NRPFdLHjJGhyOjS+jfHp3D5VW0VK3m0mRw8rAe9a9+NYo92sy9Y0HnLv0Ho0wqn3XYhVVNc8fRJy2ewa+0rRy8Yz2jakRD3ppMdfV6uhw+loIsmipo6eIfRjYAq2+S153tO7aisVjaHSuOYWCUM2pFkDWddvigsXHNBXl1kNkCw6P15IJ7jmgrOB3igSx5IC3cglp+qfFBJJ1HeCCqgsxdQIEn6nmgroLbeqEEU+pagiagt3QV5uv5IEi64QWEFeTrnxQOg4lBMgqBBPBwKB0nUPggr27kE8PzYQE3U80FfsKC0w9EeCB10EWS3vQI45WjeCBMwv6JGhQOyWcigQvLDui1kCBxkO6UDsoIG5pbpyQKP0oO92IFMLRrcoG5zuQQKGiUbztCgCwRjebxCBM5x5IFEYeA43BKAcMoXF9UDTKUD8kcyga79EbN96AEjnENNrHRA7JaOaBpeYzujggUOMp3Tp26IFyRzKBuaQbWGiAzjyQf/2Q==" alt="Facebook"> Facebook
            </button>
        </div>
        
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>   
                @endforeach
            </ul>
        @endif

        <div class="register">
            Don't have an account? - <a href="#">Click here to create one</a>
        </div>
    </div>
    <div class="px-20">
        <img src="/images/essai4.jpeg" alt="Travelconneckt-img" class="h-100 w-100">
    </div>
</body>
</html>