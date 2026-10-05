barca = {'Yamal', 'Cubarsi','Raphinha', 'Gordon'}
spanyol = {'Cucurella', 'Rodri', 'Yamal', 'Cubarsi'}
barcaSpanyol = barca.union(spanyol)
print(barcaSpanyol)
ke2nya = barca.intersection(spanyol)
print(ke2nya)
barcaOnly = barca.difference(spanyol)
print(barcaOnly)
spanyolOnly = spanyol.difference(barca)
print(spanyolOnly)