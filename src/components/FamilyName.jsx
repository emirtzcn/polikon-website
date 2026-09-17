// Renders a product family name with "IKO" in the brand accent color.
export default function FamilyName({ name }) {
  const [prefix, ...rest] = name.split(' ')
  return (
    <>
      <span className="accent-word">{prefix}</span> {rest.join(' ')}
    </>
  )
}
